<?php
if (isset($_POST['nome']))
    $nome = $_POST['nome'];
else
    $nome = "";
if (isset($_POST['username']))
    $user = $_POST['username'];
else
    $user = "";
if (isset($_POST['password']))
    $pass = $_POST['password'];
else
    $pass = "";
if (isset($_POST['repassword']))
    $repassword = $_POST['repassword'];
else
    $repassword = "";

//CHECK PASSWORD
if (!empty($pass)) {
    if ($pass != $repassword) {
        echo "<p> Hai sbagliato a digitare la password. Riprova</p>";
        $pass = "";
    } else {
        //ANDREBBERO INSERITI ANCHE I CONTROLLI DEGLI ALTRI VALORI OBBLIGATORI
        //....

        //CONTROLLO SE L'UTENTE GIA' ESISTE
        if (username_exist($user)) {
            echo "<p> Username $user già esistente. Riprova</p>";
        } else {
            //ORA posso inserire il nuovo utente nel db
            if (insert_utente($nome, $user, $pass)) {
                echo "<p> Utente registrato con successo. Effettua il <a href=\"login.html\">login</a></p>";
            } else {
                echo "<p> Errore durante la registrazione. Riprova</p>";
            }
        }
    }
}

?>

<p>
<h3>Registrati</h3>
</p>
<form method="post" action="registrati.php">
    <p>
        <label for="nome">Nome
            <input type="text" name="nome" id="nome" value="<?php echo $nome ?>" />
        </label>
    </p>
    <p>
        <label for="username">Username
            <input type="text" name="username" id="username" value="<?php echo $user ?>" />
        </label>
    </p>
    <p>
        <label for="password">Password
            <input type="password" name="password" id="password" value="<?php echo $pass ?>" />
        </label>
    </p>
    <p>
        <label for="repassword">Ripeti la password
            <input type="password" name="repassword" id="repassword" value="<?php echo $repassword ?>" />
        </label>
    </p>
    <p>
        <input type="submit" name="registra" value="Registrati" />
    </p>
</form>

<?php
function username_exist($user)
{
    require "./db.php";
    //CONNESSIONE AL DB
    $db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());
    //echo "Connessione al database riuscita<br/>"; 
    $sql = "SELECT username FROM account WHERE username=$1";
    $prep = pg_prepare($db, "sqlUsername", $sql);
    $ret = pg_execute($db, "sqlUsername", array($user));
    if (!$ret) {
        echo "ERRORE QUERY: " . pg_last_error($db);
        return false;
    } else {
        if ($row = pg_fetch_assoc($ret)) {
            return true;
        } else {
            return false;
        }
    }
}

function insert_utente($nome, $user, $pass)
{
    require "./db.php";
    //CONNESSIONE AL DB
    $db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());
    //echo "Connessione al database riuscita<br/>"; 
    $hash = password_hash($pass, PASSWORD_DEFAULT);
    $sql = "INSERT INTO ACCOUNT(nome, username, password) VALUES($1, $2, $3)";
    $prep = pg_prepare($db, "insertUser", $sql);
    $ret = pg_execute($db, "insertUser", array($nome, $user, $hash));
    if (!$ret) {
        echo "ERRORE QUERY: " . pg_last_error($db);
        return false;
    } else {
        return true;
    }
}
?>