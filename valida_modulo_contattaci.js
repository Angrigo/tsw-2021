function validaModuloContattaci(nomeModulo) {
    nomeModulo.fname.classList.remove("redBorder");
    nomeModulo.lname.classList.remove("redBorder");
    nomeModulo.email.classList.remove("redBorder");
    nomeModulo.subject.classList.remove("redBorder");

    if (nomeModulo.fname.value == "") {
        alert("Inserire il nome!");
        nomeModulo.fname.focus();
        nomeModulo.fname.classList.add("redBorder");
        return false;
    }
    if (nomeModulo.lname.value == "") {
        alert("Inserire il cognome!");
        nomeModulo.lname.focus();
        nomeModulo.lname.classList.add("redBorder");
        return false;
    }
    if (nomeModulo.email.value == "") {
        alert("Inserire un email!");
        nomeModulo.email.focus();
        nomeModulo.email.classList.add("redBorder");
        return false;
    }
    if (nomeModulo.subject.value == "") {
        alert("Inserire un testo!");
        nomeModulo.subject.focus();
        nomeModulo.subject.classList.add("redBorder");
        return false;
    }
    
    return true;
}






