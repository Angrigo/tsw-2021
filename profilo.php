<?php
include("check_reserved.php");

if(!isset($_SESSION)) 
    session_start();
$id = 0;
$output = "";
$nome = "";
$email = "";

require "db.php";
//CONNESSIONE AL DB
$db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());
$sql = "SELECT id, nome, email, data_creazione FROM iscrizioni WHERE email=$1 LIMIT 1;";
$prep = pg_prepare($db, "sqlPassword", $sql);
$ret = pg_execute($db, "sqlPassword", array($_SESSION["email"]));
if (!$ret) {
    echo "ERRORE QUERY: " . pg_last_error($db);
    return false;
} else {
    if ($row = pg_fetch_assoc($ret)) {
        if($row && $row["email"]) { //l'utente esiste
            $id = $row['id'];
            $nome = $row['nome'];
            $email = $row['email'];
            $data_creazione = $row['data_creazione'];
        } else {
            $output = "Utente non trovato.";
        }
    }
}

if(isset($_FILES) && isset($_FILES['profilepic'])){
    if(is_uploaded_file($_FILES['profilepic']['tmp_name'])){
        $target_file = "static/users/" . $id .".png";
        if(file_exists($target_file)) {
            chmod($target_file,0755);
            unlink($target_file);
        }
        move_uploaded_file($_FILES["profilepic"]["tmp_name"], $target_file);
    }
}


?>

<!DOCTYPE html>
<html>

<?php include("head.html"); ?>



<body>
    <?php include("header.php"); ?>
    <div class="content">
        <div class="column_left">
            
            <h2> Profilo utente </h2>
            

        </div>
        <div class="column_middle">
        <h2> Dati utente </h2>
        <?php if($output == "") { ?>

            <p>Nome: <?php echo $nome ?></p>
            <p>Email: <?php echo $email ?></p>
            <p>Data iscrizione: <?php echo $data_creazione ?></p>
            <?php } else { ?>
            <p><?php echo $output ?></p>
            <?php } ?>
            
            <br>
            <form method="post" action="profilo.php" enctype='multipart/form-data'>
                <label for="profilepic">Scegli immagine profilo:</label>
                <input type="file" id="profilepic" name="profilepic" accept="image/png" />
                <button type=submit>Salva immagine</button>
            </form>
        </div>
        <div class="column_right">
            <h2> Immagine utente </h2>
            <img id="profileimg" src="./static/users/<?php echo $id ?>.png"  />
        </div>

    </div>
    <?php include("footer.html"); ?>
</body>

</html>