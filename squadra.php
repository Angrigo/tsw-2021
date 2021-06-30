<?php
if(!isset($_SESSION)) 
    session_start();
$id = $_GET["id"];
$nome = "";
$immagine = "";
$output = "";


require "db.php";
//CONNESSIONE AL DB
$db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());
$sql = "SELECT * FROM squadre as squadra
LEFT JOIN recensioni as rec ON squadra.id = rec.squadra
WHERE squadra.id=$1";
//LEFT JOIN iscrizioni as utente ON rec.utente = utente.id
$prep = pg_prepare($db, "stmt1", $sql);
$ret = pg_execute($db, "stmt1", array($id));
if (!$ret) {
    echo "ERRORE QUERY: " . pg_last_error($db);
    return false;
} else {
    var_dump(pg_fetch_assoc($ret));
    //print_r(pg_fetch_assoc($ret));

    die();
/*     while ($row = pg_fetch_assoc($ret)) {
        if($row) {
            $id = $row['idsquadra'];
            $nome = $row['nomesquadra'];
            $immagine = $row['immaginesquadra'];

            print_r($row);
        } else {
            $output = "Utente non trovato.";
        }
    } */
}

?>


<!DOCTYPE html>
<html>

<?php include("head.php"); ?>



<body>
    <?php include("header.php"); ?>
    <div class="content">
        <div class="column_left">
            <h2> Dettaglio squadra </h2>
        </div>
        <div class="column_middle">
        <h2> Dati squadra </h2>
        <?php if($output == "") { ?>

            <p>Nome: <?php echo $nome ?></p>
            <?php } else { ?>
            <p><?php echo $output ?></p>
            <?php } ?>
        </div>
        <div class="column_right">
            <h2> Immagine squadra </h2>
            <img class='logo' src="./assets/images/<?php echo $immagine ?>"  />
        </div>

    </div>
    <?php include("footer.html"); ?>
</body>

</html>