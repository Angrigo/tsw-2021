<?php

$output = "";
$user = "";

function get_pwd($user)
{
    require "db.php";

    //CONNESSIONE AL DB
    $db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());
    $sql = "SELECT password FROM iscrizioni WHERE email=$1;";
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

if ($_POST && $_POST['email'] && $_POST['password']) {
    $user =  $_POST['email'];
    $pass =  $_POST['password'];
    //chiama la funzione get_pwd che controlla
    //se email esiste nel DB. Se esiste, restituisce la password (hash), altrimenti restituisce false.
    $hash = get_pwd($user);
    if (!$hash) {
        $output = "L'utente $user non esiste. <a href=\"login.php\">Riprova</a>";
    } else {
        if (password_verify($pass, $hash)) {
            $output = "Login Eseguito con successo";
            //Se il login è corretto, inizializziamo la sessione
            session_start();
            $_SESSION['email'] = $user;
            //$output =  "<a href=\"reserved.php\">Accedi</a> al contenuto riservato solo agli utenti registrati.";
            header("Location: profilo.php");
        } else {
            $output = 'Email o password errati. <a href="login.php">Riprova</a>';
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
            <h2>Login</h2>
        </div>
        <div class="column_middle">
            <p>
            <h3>Effettua il login</h3>
            </p>
            <?php if($output == "") { ?>
            <form method="post" action="login.php">
                <p>
                    <label for="email">Email
                        <input type="email" name="email" id="email" value="<?php echo $user ?>" />
                    </label>
                </p>
                <p>
                    <label for="password">Password
                        <input type="password" name="password" id="password" />
                    </label>
                </p>
                <p>
                    <input id="bottonelogin" type="submit" name="invia" value="Login" />
                </p>
                <input type="checkbox" id='checkbox' name="remember" id ="remember"   /> 
                              <label for="remember"> Rimani Connesso </label>
                    
            </form> <!-- ALLINEARE IL BOX CON LA SCRITTA RIMANI CONNESSO! -->

            <p>Nuovo utente? <a href="registrati.php">Registrati!</a></p>
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