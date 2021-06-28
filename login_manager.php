<?php

function get_pwd($user)
{
    require "db.php";
    //CONNESSIONE AL DB
    $db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());
    $sql = "SELECT password FROM account WHERE email=$1;";
    $prep = pg_prepare($db, "sqlPassword", $sql);
    $ret = pg_execute($db, "sqlPassword", array($user));
    if (!$ret) {
        echo "ERRORE QUERY: " . pg_last_error($db);
        return false;
    } else {
        if ($row = pg_fetch_assoc($ret)) {
            $pass = $row['password'];
            return $pass;
        } else {
            return false;
        }
    }
}


if ($_POST['email'] && $_POST['password']) {
    $user =  $_POST['email'];
    $pass =  $_POST['password'];
    //chiama la funzione get_pwd che controlla
    //se email esiste nel DB. Se esiste, restituisce la password (hash), altrimenti restituisce false.
    $hash = get_pwd($user);
    if (!$hash) {
        echo "<p> L'utente $user non esiste. <a href=\"login.html\">Riprova</a></p>";
    } else {
        if (password_verify($pass, $hash)) {
            echo "<p>Login Eseguito con successo</p>";
            //Se il login è corretto, inizializziamo la sessione
            session_start();
            $_SESSION['email'] = $user;
            echo "<p><a href=\"reserved.php\">Accedi</a> al contenuto riservato solo agli utenti registrati<p>";
        } else {
            echo 'Email o password errati. <a href="login.html">Riprova</a>';
        }
    }
} else {
    echo "<p>ERRORE: email o password non inseriti <a href=\"login.html\">Riprova</a></p>";
    exit();
}
