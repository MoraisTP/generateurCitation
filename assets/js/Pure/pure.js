const citations = [
    "PHP c'est vraiment de la merde , je te jure !. — Isaac Newton",
    "Il n'y a pas de réussite sans échec. — Albert Einstein",
    "PHP c'est vraiment de la merde , je te jure !. — Galilée",
    "L'avenir appartient à ceux qui croient à la beauté de leurs rêves. — Eleanor Roosevelt",
    "PHP c'est vraiment de la merde , je te jure !. — Alan Turing",
    "Le succès, c'est d'aller d'échec en échec sans perdre son enthousiasme. — Winston Churchill",
    "PHP c'est vraiment de la merde , je te jure !. — Stephen Hawking",
    "Le voyage de mille lieues commence par un pas. — Lao-Tseu",
    "PHP c'est vraiment de la merde , je te jure !. — Albert Einstein"
];

function genererCitation() {
    const index = Math.floor(Math.random() * citations.length);
    const citation = citations[index];  // Modification ici
    document.getElementById("citation").textContent = citation;
}


document.getElementById("btn-citation").addEventListener("click", genererCitation);


genererCitation();