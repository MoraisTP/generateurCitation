const mot = document.querySelector(".mot");
const chances = document.querySelector(".chances b");
const clavierDiv = document.querySelector(".clavier");
const penduImage = document.querySelector(".penduBox img");
const gameModal = document.querySelector(".game-modal");
const rejourBtn = gameModal.querySelector("button");

let motActuel, lettresCorrect, compteur;
const compteurMax = 6;

const resetPendu = () => {
    lettresCorrect = [];
    compteur = 0;
    penduImage.src = "/assets/img/hangman-0.svg";
    chances.innerText = `${compteur} / ${compteurMax}`;
    mot.innerHTML = motActuel.split("").map(() => `<li class="letter"></li>`).join("");
    clavierDiv.querySelectorAll("button").forEach(btn => btn.disabled = false);
    gameModal.classList.remove("show");
}

const motRandom = () => {
    const { mot, indice } = listeMot[Math.floor(Math.random() * listeMot.length)];
    motActuel = mot;
    document.querySelector(".indice b").innerText = indice;
    resetPendu();
}

const perdu = (siVictoire) => {
    const modalText = siVictoire ? `T'as trouvé le mot :` : 'Le bon mot était :';
    gameModal.querySelector("img").src = `/assets/img/${siVictoire ? 'victory' : 'lost'}.gif`;
    gameModal.querySelector("h4").innerText = siVictoire ? 'Félicitations !!' : 'T as perdu!';
    gameModal.querySelector("p").innerHTML = `${modalText} <b>${motActuel}</b>`;
    gameModal.classList.add("show");
}

const initGame = (button, clickedLetter) => {
    if(motActuel.includes(clickedLetter)) {
        [...motActuel].forEach((letter, index) => {
            if(letter === clickedLetter) {
                lettresCorrect.push(letter);
                mot.querySelectorAll("li")[index].innerText = letter;
                mot.querySelectorAll("li")[index].classList.add("guessed");
            }
        });
    } else {
        compteur++;
        penduImage.src = `/assets/img/hangman-${compteur}.svg`;
    }
    button.disabled = true;
    chances.innerText = `${compteur} / ${compteurMax}`;
    if(compteur === compteurMax) return perdu(false);
    if(lettresCorrect.length === motActuel.length) return perdu(true);
}

for (let i = 97; i <= 122; i++) {
    const button = document.createElement("button");
    button.innerText = String.fromCharCode(i);
    clavierDiv.appendChild(button);
    button.addEventListener("click", (e) => initGame(e.target, String.fromCharCode(i)));
}

motRandom();
rejourBtn.addEventListener("click", motRandom);
