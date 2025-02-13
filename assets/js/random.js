// Partie BURGER, on récup le burger et la nav puis on jout un event click. On ferme le menu si on clique ou ouvre un lien de la nav. Dernière partie on ferme le menu si on clique en dehors.
document.addEventListener("DOMContentLoaded", function() {
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.nav-links');
    const navLinks = document.querySelectorAll('.nav-links li');

    burger.addEventListener('click', () => {
        nav.classList.toggle('nav-active');
        burger.classList.toggle('toggle');
    });

    navLinks.forEach(link => {
        link.addEventListener('click', () => {
            nav.classList.remove('nav-active');
            burger.classList.remove('toggle');
        });
    });

    document.addEventListener('click', (event) => {
        if (!nav.contains(event.target) && !burger.contains(event.target)) {
            nav.classList.remove('nav-active');
            burger.classList.remove('toggle');
        }
    });
// Partie GENERER
    // Gestion du bouton "GÉNÉRER" on recoit les données de l'api.php en json puis on les innerHTML, on ajout une citation, un auteur et le bouton fav.
    document.getElementById("generer-btn").addEventListener("click", async function() {
        let response = await fetch("../php/api.php");
        let data = await response.json();
        let citationText = `"${data.texte}"`;
        let citationAuthor = data.auteur ? `— ${data.auteur}` : "";

        document.getElementById("citation").innerHTML = `${citationText} <br> <strong>${citationAuthor}</strong>`;
        let favoriBtn = document.getElementById("favori-btn");
        favoriBtn.setAttribute("data-citation-id", data.id);
        favoriBtn.innerHTML = "💜 Ajouter aux favoris";
    });
});


// Parti favoris, on récup la citationId et on l'envoie au serveur puis on switch le bouton en mode 'retirer fav'
document.getElementById("favori-btn").addEventListener("click", async function () {
    let citationId = this.getAttribute("data-citation-id");

    try {
        let response = await fetch("php/favorisData.php", {
            method: "POST",
            body: JSON.stringify({ citations_id: citationId }),
            headers: { "Content-Type": "application/json" }
        });

        if (!response.ok) {
            throw new Error("Erreur fav");
        }

        let result = await response.json();

        if (result.status === "added") {
            this.innerHTML = "💔 Retirer des favoris";
        } else if (result.status === "removed") {
            this.innerHTML = "💜 Ajouter aux favoris";
        }
    } catch (error) {
        console.error("Erreur :", error);
    }
});
// Partie copier coller, on pioche les données de citation (text) et on les copies grâce à clipboard
function copierCittion() {
    let citationTexte = document.getElementById("citation").innerText;

    if (citationTexte.trim() === "") {
        alert("Y a pas de citation à copier frr !");
        return;
    }
    navigator.clipboard.writeText(citationTexte)
        .then(() => alert("Texte copié : " + citationTexte))
}

