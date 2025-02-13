// Bonus pour le projet, on crée les const/let > le resetPendu permet de réinitialiser le jeu (on donne une valeur 0 au compteur, pas de lterres, on reset l'affichage sur l'svg.
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
// Mot random permet de piocher un mot dans listMot et met à jour le nom à trouver + indice, puis on reset le jeu en rappelant la fonc resetPendu
const motRandom = () => {
    const { mot, indice } = listeMot[Math.floor(Math.random() * listeMot.length)];
    motActuel = mot;
    document.querySelector(".indice b").innerText = indice;
    resetPendu();
}
// vérifie si le joueur a gagné et ffiche un message victoire/défaite
const perdu = (siVictoire) => {
    const modalText = siVictoire ? `T'as trouvé le mot :` : 'Le bon mot était :';
    gameModal.querySelector("img").src = `/assets/img/${siVictoire ? 'victory' : 'lost'}.gif`;
    gameModal.querySelector("h4").innerText = siVictoire ? 'Félicitations !!' : 'T as perdu!';
    gameModal.querySelector("p").innerHTML = `${modalText} <b>${motActuel}</b>`;
    gameModal.classList.add("show");
}
// Lancement du jeu, on vérifie si le motctuel contient la "ClickedLetter", si elle est ===, alors on push la lettre. Puis dans notre else on fait un compteur ++ pou augmenter le compteur. à la fin, on compre si le compteur est === au compteur max et on déclanche défaite/victoire
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
// clavier virtuel, grâce aux "ASCII" on fait un clavier, on lui donne un button, une lettre avec string.fromchar puis on ajoute un event au clique pour start le jeu
for (let i = 97; i <= 122; i++) {
    const button = document.createElement("button");
    button.innerText = String.fromCharCode(i);
    clavierDiv.appendChild(button);
    button.addEventListener("click", (e) => initGame(e.target, String.fromCharCode(i)));
}
// Relance en cliquant sur rejouer
motRandom();
rejourBtn.addEventListener("click", motRandom);
