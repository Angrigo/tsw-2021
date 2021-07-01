
function validaModuloRegistrati(nomeModulo) {
    if (nomeModulo.nome.value == "") {
        alert("Inserire un nome!");
        nomeModulo.nome.focus();
        nomeModulo.nome.classList.add("redBorder");
        return false;
    }
    if (nomeModulo.email.value == "") {
        alert("Inserire un email!");
        nomeModulo.email.focus();
        nomeModulo.email.classList.add("redBorder");
        return false;
    }
    if (nomeModulo.password.value == "") {
        alert("Inserire una password!");
        nomeModulo.password.focus();
        nomeModulo.password.classList.add("redBorder");
        return false;
    }
    if (nomeModulo.repassword.value == "") {
        alert("Inserire la riconferma della password!");
        nomeModulo.repassword.focus();
        nomeModulo.repassword.classList.add("redBorder");
        return false;
    }
    
    if (nomeModulo.password.value.length < 6) {
        alert("La password deve avere almeno 6 caratteri!");
        nomeModulo.password.focus();
        nomeModulo.password.classList.add("redBorder");
        return false;
    }

    if (nomeModulo.repassword.value.length < 6) {
        alert("La riconferma della password deve avere almeno 6 caratteri!");
        nomeModulo.repassword.focus();
        nomeModulo.repassword.classList.add("redBorder");
        return false;
    }

    if (nomeModulo.repassword.value != nomeModulo.password.value) {
        alert("Le password non coincidono!");
        nomeModulo.password.focus();
        nomeModulo.password.classList.add("redBorder");
        nomeModulo.repassword.classList.add("redBorder");
        return false;
    }

    return true
}



