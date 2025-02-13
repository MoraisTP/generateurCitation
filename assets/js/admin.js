// Permet de récuperer les données du formulaire avec l'id ajoutCitationForm puis de les envoyers vers la BDD grâce au php ajout citation.
document.getElementById("ajoutCitationForm").addEventListener("submit", async function (e) {
    e.preventDefault();

    let citation = document.getElementById("texte").value;
    let auteur = document.getElementById("auteur").value;

    let response = await fetch("/php/ajoutCitation", {
        method: "POST",
        body: JSON.stringify({ texte: citation, auteur: auteur }),
        headers: { "Content-Type": "application/json" }
    });

    let result = await response.json();
    if (result.status === "success") location.reload();
});

// reçois les données de l'api php puis crée une li avec la citation et le non de l'auteur
document.addEventListener("DOMContentLoaded", async function () {
    let response = await fetch("/php/api.php");
    let citations = await response.json();

    let list = document.getElementById("liste-citations");
    citations.forEach(citation => {
        let li = document.createElement("li");
        let p = document.createElement("p");
        p.innerHTML = `"${citation.texte}" - <span>${citation.auteur}</span>`;

        let button = document.createElement("button");
        button.textContent = "❌ Supprimer";
        button.onclick = () => supprimer(citation.id);

        li.appendChild(p);
        li.appendChild(button);
        list.appendChild(li);

// permet de supprimer une citation de la bdd, on fait appel à supCitation pour del la citation de labdd
async function supprimer(id) {
    await fetch("/php/suppCitation", {
        method: "POST",
        body: JSON.stringify({ citation_id: id }),
        headers: { "Content-Type": "application/json" }
    });
    location.reload();
}
