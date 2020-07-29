let tabsub =
[

    ["user_nom" , "nom_error", "Le nom est incorrect", "^(\\w+\\D){1,20}$"],
    ["user_prénom", "prénom_error", "Le prénom est incorrect", "^(\\w+\\D){1,20}$"],
    ["user_mail" , "mail_error", "Le mail est incorrect", "^[^\\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$"],
    ["user_mdp" , "mdp_error", "Mot de passe non valide", "^(?=.*\\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,}$"],
    ["user_mdp2" ,"mdp2_error", "Mot de passe non valide", "^(?=.*\\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,}$"],
]

function verification() { // Appelle de la fonction pour commencer la vérification des données entrées dans les champs

    let sortie = true;
    for (let i = 0; i < tabsub.length ; i++) { // Permet la vérification dans le tableau grâce à sa longueur
        if (check(tabsub[i][0], tabsub[i][1], tabsub[i][2], tabsub[i][3]) === false) {
            sortie = false // Si il y'a une erreur cela va les afficher
        }
    }
    return sortie
}


//  Lance la vérification au clique de "Envoyer" du formulaire
let verifsub = document.getElementById("subbutton")
if (verifsub) {
    verifsub.addEventListener("click", function (event) {
        console.log(verification());
        event.preventDefault()
        if (verification()) {
            document.getElementById("sub-form").submit();

        }
    });
}
