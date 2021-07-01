function validaModuloLogin(nomeModulo) {
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
    
    if (nomeModulo.password.value.length < 6) {
        alert("La password deve avere almeno 6 caratteri!");
        nomeModulo.password.focus();
        nomeModulo.password.classList.add("redBorder");
        return false;
    }

    return true
}



