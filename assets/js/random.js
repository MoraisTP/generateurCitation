document.addEventListener("DOMContentLoaded", function() {
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.nav-links');
    const navLinks = document.querySelectorAll('.nav-links li');

    // Ouvrir/fermer le menu burger
    burger.addEventListener('click', () => {
        nav.classList.toggle('nav-active');
        burger.classList.toggle('toggle'); // Animation du burger en croix
    });

    // Fermer le menu lorsqu'on clique sur un lien
    navLinks.forEach(link => {
        link.addEventListener('click', () => {
            nav.classList.remove('nav-active');
            burger.classList.remove('toggle');
        });
    });

    // Fermer le menu lorsqu'on clique en dehors du menu
    document.addEventListener('click', (event) => {
        if (!nav.contains(event.target) && !burger.contains(event.target)) {
            nav.classList.remove('nav-active');
            burger.classList.remove('toggle');
        }
    });

    // Gestion du bouton "GÉNÉRER"
    document.getElementById("generer-btn").addEventListener("click", async function() {
        let response = await fetch("../php/api.php");
        let data = await response.json();

        let citationText = `"${data.texte}"`;
        let citationAuthor = data.auteur ? `— ${data.auteur}` : "";

        document.getElementById("citation").innerHTML = `${citationText} <br> <strong>${citationAuthor}</strong>`;
    });
});