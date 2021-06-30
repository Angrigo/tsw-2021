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
        $output = "Hai sbagliato a digitare la password. <a href='registrati.php'>Riprova!</a>";
        $pass = "";
    } else {
        //ANDREBBERO INSERITI ANCHE I CONTROLLI DEGLI ALTRI VALORI OBBLIGATORI
        //....

        //CONTROLLO SE L'UTENTE GIA' ESISTE
        if (email_exist($email)) {
            $output = "Email $email già esistente. <a href=\"registrati.php\">Riprova</a>";
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

<head>
<?php include("head.php"); ?>
<script src="valida_modulo.js" type="text/javascript"></script>
</head>

<body>
    <?php include("header.php"); ?>
    <div class="content">
        <div class="column_left">
            <h2> Registrati </h2>
        </div>
        <div class="column_middle">
            <?php if($output == "") { ?>
            <p>
            <h3>Registrazione</h3>
            </p>
            <form method="post" action="registrati.php" onSubmit="return validaModulo(this);">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome"/>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" />
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Min. 6 characters"/>
                <label for="repassword">Ripeti passw</label>
                <input type="password" name="repassword" id="repassword" placeholder="Min. 6 characters"/>
                <button type="submit" name="invia">Registrati</button>
            </form>
            <p> Sei gi&agrave; registrato? <a href="login.php">Effettua il login!</a></p>
            <?php } else { ?>
            <p><?php echo $output ?></p>
            <?php
			    foreach ($_POST as $key => $value){
				    $$key = $value;
			    }
		    ?>
		    <?php
				echo "<h3> Dati recuperati dal form </h3>";
		    ?>
		     <fieldset>
			    <legend> Account </legend>
			    <p> Nome: <?php echo $nome; ?> </p>
                <p> E-mail: <?php echo $email; ?> </p>
			    <p> Password: <?php echo $password; ?> </p>
		    </fieldset>
		    <?php
			    }
		    ?>
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
    $sql = "INSERT INTO iscrizioni(id, nome, email, password) VALUES(DEFAULT, $1, $2, $3)";
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