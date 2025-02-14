async function getRandQuote() {
    try {

        let response = await fetch('http://localhost/PHP%20C%20DLA%20MERDE/api.php');
        let quote = await response.json();
        console.log(quote);

        if (quote.error){
            console.error(quote.error);
        } else{
            document.getElementById("citation-author").textContent = `— "${quote.auteur}"`;
            document.getElementById("citation-text").textContent = `"${quote.texte}"`;
        }

    } catch (error){
        console.log(error);
    }
}

document.getElementById("generer-btn").addEventListener("click", getRandQuote);
 document.addEventListener("DOMContentLoaded", () => {
    getRandQuote();
 });