function check(id, iderror, errormsg, regexp)  { // Permet de centraliser les variables et les conditions pour chaque ID, RegEx et MSG d'erreurs
    let idObj = document.getElementById(id).value;
    let idError = document.getElementById(iderror);
    let filtre = new RegExp(regexp);
    if (filtre.test(idObj) === true) {
        return true;
    } else {
         return msgerror(idError, errormsg);

    }

}

function checkselect(id, iderror, errormsg) {
    let menuselect = document.getElementById("artist_id");
    let iderrorSelect = menuselect.options[menuselect.selectedIndex].value;
    let errorselect = document.getElementById("artist-error");
    if (iderrorSelect !== "empty") {
        return true;
    } else {
        return msgerror(errorselect, errormsg);
    }
}

function msgerror(iderror, errormsg){
    iderror.textContent = errormsg;
    iderror.style.color = "red";
    iderror.style.display = "";
    return false;
}
