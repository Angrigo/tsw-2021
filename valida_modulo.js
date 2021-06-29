function validaModulo(nomeModulo) {
    if (nomeModulo.nome.value == "") {
        alert("Inserire un nome!");
        nomeModulo.nome.focus();
        return false;
    }
    if (nomeModulo.password.value == "") {
        alert("Inserire una password!");
        nomeModulo.password.focus();
        return false;
    }
    return true
}