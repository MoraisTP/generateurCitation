document.getElementById("ajoutCitationForm").addEventListener("submit", async function (e) {
    e.preventDefault();

    let citation = document.getElementById("texte").value;
    let auteur = document.getElementById("auteur").value;

    let response = await fetch("../php/ajouter_citation.php", {
        method: "POST",
        body: JSON.stringify({ texte: citation, auteur: auteur }),
        headers: { "Content-Type": "application/json" }
    });

    let result = await response.json();
    if (result.status === "success") location.reload();
});

document.addEventListener("DOMContentLoaded", async function () {
    let response = await fetch("../php/api.php");
    let citations = await response.json();

    let list = document.getElementById("liste-citations");
    citations.forEach(citation => {
        let li = document.createElement("li");
        li.innerHTML = `"${citation.texte}" - <strong>${citation.auteur}</strong> 
            <button onclick="supprimer(${citation.id})">❌ Supprimer</button>`;
        list.appendChild(li);
    });
});

async function supprimer(id) {
    await fetch("../php/supprimer_citation.php", {
        method: "POST",
        body: JSON.stringify({ citation_id: id }),
        headers: { "Content-Type": "application/json" }
    });
    location.reload();
}
