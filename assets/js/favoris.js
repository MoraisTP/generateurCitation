// Permet de gérer les favoris (user) en utilisant du php + js, on reçois les données en json puis on fait un foreach pour créer un li sur chaque citation. Chaque élément contient un texte, l'auteur et un bouton pour del
document.addEventListener("DOMContentLoaded", async function () {
    let response = await fetch("/php/apiFavori.php");
    let favoris = await response.json();

    let list = document.getElementById("favoris-list");
    list.innerHTML = "";

    favoris.forEach(citation => {
        let li = document.createElement("li");
        li.innerHTML = `"${citation.texte}" - <strong>${citation.auteur}</strong>`;

        let deleteBtn = document.createElement("button");
        deleteBtn.textContent = "❌ Supprimer";
        deleteBtn.classList.add("delete-fav");
        deleteBtn.setAttribute("data-citations-id", citation.id);

        deleteBtn.addEventListener("click", async function () {
            let citationId = this.getAttribute("data-citations-id");

            let response = await fetch("/php/suppFavori.php", {
                method: "POST",
                body: JSON.stringify({ citations_id: citationId }),
                headers: { "Content-Type": "application/json" }
            });

            let result = await response.json();

            if (result.success) {
                this.parentElement.remove();
            } else {
                alert("Erreur lors de la suppression");
            }
        });

        li.appendChild(deleteBtn);
        list.appendChild(li);
    });
});
