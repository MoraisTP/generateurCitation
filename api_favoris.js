document.addEventListener("DOMContentLoaded", async function () {
    let response = await fetch("api_favoris.php");
    let favoris = await response.json();

    let list = document.getElementById("favoris-list");
    list.innerHTML = "";

    favoris.forEach(citation => {
        let li = document.createElement("li");
        li.innerHTML = "${citation.texte}" - "<strong>${citation.auteur}</strong>";

        let deleteBtn = document.createElement("button");
        deleteBtn.textContent = "❌ Supprimer";
        deleteBtn.classList.add("delete-fav");
        deleteBtn.setAttribute("data-citations-id", citation.id);

        deleteBtn.addEventListener("click", async function () {
            let citationId = this.getAttribute("data-citations-id");

            let response = await fetch("supp_favori.php", {
                method: "POST",
                body: JSON.stringify({ citations_id: citationId }),
                headers: { "Content-Type": "application/json" }
            });

            let result = await response.json();

            if (result.success) {
                this.parentElement.remove(); // Supprime l'élément de la liste visuellement
            } else {
                alert("Erreur lors de la suppression");
            }
        });

        li.appendChild(deleteBtn);
        list.appendChild(li);
    });
});