let tabupd =
    [

        ["user-mail" , "mail-error", "Le mail est incorrect", "^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$"],
        ["user-mdp" , "mdp-error", "Mot de passe non valide", "^(?=.*\\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,}$"],
    ]

function verification() { // Appelle de la fonction pour commencer la vérification des données entrées dans les champs

    let sortie = true;
    for (let i = 0; i < tabupd.length ; i++) { // Permet la vérification dans le tableau grâce à sa longueur
        if (check(tabupd[i][0], tabupd[i][1], tabupd[i][2], tabupd[i][3]) === false) {
            sortie = false // Si il y'a une erreur cela va les afficher
        }
    }
    return sortie
}


//  Lance la vérification au clique de "Envoyer" du formulaire
let verifupd = document.getElementById("logbutton")
if (verifupd) {
    verifupd.addEventListener("click", function (event) {
        console.log(verification());
        event.preventDefault()
        if (verification()) {
            document.getElementById("log-form").submit();

        }
    });
}
