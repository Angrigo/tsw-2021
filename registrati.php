<?php

$output = "";

if (isset($_POST['nome']))
    $nome = $_POST['nome'];
else
    $nome = "";

if (isset($_POST['email']))
    $email = $_POST['email'];
else
    $email = "";
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
        $output = "Hai sbagliato a digitare la password. Riprova.";
        $pass = "";
    } else {
        //ANDREBBERO INSERITI ANCHE I CONTROLLI DEGLI ALTRI VALORI OBBLIGATORI
        //....

        //CONTROLLO SE L'UTENTE GIA' ESISTE
        if (email_exist($email)) {
            $output = "Email $email già esistente. Riprova.";
        } else {
            //ORA posso inserire il nuovo utente nel db
            if (insert_utente($nome, $email, $pass)) {
                $output = "Utente registrato con successo. <a href='login.php'>Effettua il login!</a>";
            } else {
                $output = "Errore durante la registrazione. Riprova.";
            }
        }
    }
}

?>
<!DOCTYPE html>
<html>

<?php include("head.php"); ?>

<body>
    <?php include("header.php"); ?>
    <div class="content">
        <div class="column_left">
            <h2> Registrati </h2>
        </div>
        <div class="column_middle">
            <p>
            <h3>Registrazione</h3>
            </p>
            <?php if($output == "") { ?>
            <form method="post" action="registrati.php">
                <p>
                    <label for="name">Nome
                        <input type="text" name="nome" id="nome" />
                    </label>
                </p>
                <p>
                    <label for="email">Email
                        <input type="email" name="email" id="email" />
                    </label>
                </p>
                <p>
                    <label for="password">Password
                        <input type="password" name="password" id="password" />
                    </label>
                </p>
                <p>
                    <label for="repassword">Repassword
                        <input type="password" name="repassword" id="repassword" />
                    </label>
                </p>
                <p>
                    <input type="submit" name="invia" value="Registrati" />
                </p>
            </form>
            <p> Sei gi&agrave; un utente? <a href="login.php">Effettua il login!</a></p>
            <?php } else { ?>
            <p><?php echo $output ?></p>
            <?php } ?>
        </div>
        <div class="column_right">

        </div>
    </div>
    <?php include("footer.html"); ?>
</body>

</html>



<?php
function email_exist($email)
{
    require "./db.php";
    //CONNESSIONE AL DB
    $db = pg_connect($connection_string) or die('Impossibile connettersi al database: ' . pg_last_error());
    //echo "Connessione al database riuscita<br/>"; 
    $sql = "SELECT email FROM iscrizioni WHERE email=$1";
    $prep = pg_prepare($db, "sqlEmail", $sql);
    $ret = pg_execute($db, "sqlEmail", array($email));
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

function insert_utente($nome, $email, $pass)
{
    require "./db.php";
    //CONNESSIONE AL DB
    $db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());
    //echo "Connessione al database riuscita<br/>"; 
    $hash = password_hash($pass, PASSWORD_DEFAULT);
    $sql = "INSERT INTO iscrizioni(nome, email, password) VALUES($1, $2, $3)";
    $prep = pg_prepare($db, "insertEmail", $sql);
    $ret = pg_execute($db, "insertEmail", array($nome, $email, $hash));
    if (!$ret) {
        echo "ERRORE QUERY: " . pg_last_error($db);
        return false;
    } else {
        return true;
    }
}
?>