

let tabadd =
[

    ["disc_title","title-error", "Le titre est incorrect", "^(\\w+\\D){2,20}$"],
    ["disc_year", "year-error", "Rentrez une année valide", "^\\d{4}$"],
    ["disc_genre", "genre-error", "Veuillez entrer un genre valide", "^(\\w+\\D){2,20}$"],
    ["disc_label", "label-error", "Veuillez entrer un label valide", "^(\\w+\\D){2,20}$"],
    ["disc_price", "price-error", "Veuillez entrer un prix valide", "^\\d+(,\\d{1,2})?$"],
    ["artist_id", "artist-error", "Sélectionnez un artist valide"],


]


function verification() { // Appelle de la fonction pour commencer la vérification des données entrées dans les champs

    let sortie = true;
    for (let i = 0; i < tabadd.length - 1; i++) { // Permet la vérification dans le tableau grâce à sa longueur
        if (check(tabadd[i][0], tabadd[i][1], tabadd[i][2], tabadd[i][3]) === false) {
            sortie = false // Si il y'a une erreur cela va les afficher
        }
        if (checkselect(tabadd[5][0], tabadd[5][1], tabadd[5][2]) === false) {
            sortie = false
        }
    }
    return sortie
}


//  Lance la vérification au clique de "Envoyer" du formulaire
let verifadd = document.getElementById("add")
if (verifadd) {
    verifadd.addEventListener("click", function (event) {
        console.log(verification());
        event.preventDefault()
        if (verification()) {
            document.getElementById("add-form").submit();

        }
    });
}
