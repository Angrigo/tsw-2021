
function validaModulo(nomeModulo) {
    if (nomeModulo.nome.value == "") {
        alert("Inserire un nome!");
        nomeModulo.nome.focus();
        return false;
    }
    if (nomeModulo.email.value == "") {
        alert("Inserire un email!");
        nomeModulo.email.focus();
        return false;
    }
    if (nomeModulo.password.value == "") {
        alert("Inserire una password!");
        nomeModulo.password.focus();
        return false;
    }
    if (nomeModulo.repassword.value == "") {
        alert("Inserire la riconferma della password!");
        nomeModulo.password.focus();
        return false;
    }
    
    /*
    if (strlen(nomeModulo.password.value) < '6') {
        alert("La password deve avere almeno 6 caratteri!");
        nomeModulo.password.focus();
        return false;
    }

    if (strlen(nomeModulo.repassword.value) < '6') {
        alert("La riconferma della password deve avere almeno 6 caratteri!");
        nomeModulo.password.focus();
        return false;
    }
    */

    if (nomeModulo.repassword.value != nomeModulo.password.value) {
        alert("Le password non coincidono!");
        nomeModulo.password.focus();
        return false;
    }

    return true
}




