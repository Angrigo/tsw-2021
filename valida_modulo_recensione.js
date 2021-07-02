
function validaModuloRecensione(nomeModulo) {
    nomeModulo.titolo.classList.remove("redBorder");
    nomeModulo.testo.classList.remove("redBorder");

    if (nomeModulo.titolo.value == "") {
        alert("Inserire un titolo!");
        nomeModulo.titolo.focus();
        nomeModulo.titolo.classList.add("redBorder");
        return false;
    }
    if (nomeModulo.testo.value == "") {
        alert("Inserire un testo!");
        nomeModulo.testo.focus();
        nomeModulo.testo.classList.add("redBorder");
        return false;
    }

    if (nomeModulo.titolo.value.length < 5) {
        alert("Il titolo deve avere almeno 5 caratteri!");
        nomeModulo.titolo.focus();
        nomeModulo.titolo.classList.add("redBorder");
        return false;
    }

    if (nomeModulo.testo.value.length < 10) {
        alert("Il testo deve avere almeno 10 caratteri!");
        nomeModulo.testo.focus();
        nomeModulo.testo.classList.add("redBorder");
        return false;
    }

    return true
}



