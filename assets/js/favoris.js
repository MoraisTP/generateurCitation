document.addEventListener("DOMContentLoaded", async function () {
    let response = await fetch("/php/apiFavori.php");
    let favoris = await response.json();

    let list = document.getElementById("favoris-list");
    favoris.forEach(citation => {
        let li = document.createElement("li");
        li.innerHTML = `"${citation.texte}" - <strong>${citation.auteur}</strong>`;
        list.appendChild(li);
    });
});