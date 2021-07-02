<?php
include("check_reserved.php");

if(!isset($_SESSION)) 
    session_start();

require "db.php";
//CONNESSIONE AL DB
$db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());
$id = $_GET["id"]; //squadra
$idUtente = $_SESSION["id"];

if($_POST){
    $titolo = $_POST["titolo"];
    $testo = $_POST["testo"];
    if($titolo && $testo){
        $sql = "INSERT INTO recensioni (titolo,testo,utente,squadra) VALUES ($1,$2,$3,$4)";
        $prep = pg_prepare($db, "stmt3", $sql);
        $ret = pg_execute($db, "stmt3", array($titolo,$testo,$idUtente,$id));
        if (!$ret) {
            echo "ERRORE QUERY: " . pg_last_error($db);
            die();
        }
    }
}

$nome = "";
$immagine = "";
$output = "";

$recensioni = [];


$sql = "SELECT * FROM squadre WHERE squadre.id=$1";
$prep = pg_prepare($db, "stmt1", $sql);
$ret = pg_execute($db, "stmt1", array($id));
if (!$ret) {
    echo "ERRORE QUERY: " . pg_last_error($db);
    die();
} else {    
    if ($row = pg_fetch_assoc($ret)) {
        if($row) {
            $id = $row['id'];
            $nome = $row['nome'];
            $immagine = $row['immagine'];
        } else {
            $output = "Utente non trovato.";
        }
    } 
}

$sql = "SELECT recensioni.titolo as titolo, recensioni.testo as testo, iscrizioni.nome as nome, recensioni.data_creazione as data_rec FROM recensioni 
JOIN iscrizioni ON iscrizioni.id = recensioni.utente
WHERE recensioni.squadra=$1 ORDER BY recensioni.data_creazione DESC LIMIT 10";
$prep = pg_prepare($db, "stmt2", $sql);
$ret = pg_execute($db, "stmt2", array($id));
if (!$ret) {
    echo "ERRORE QUERY: " . pg_last_error($db);
    die();
} else {    
    while ($row = pg_fetch_assoc($ret)) {
        if($row) {
            array_push($recensioni, $row);
        }
    } 
}
?>


<!DOCTYPE html>
<html>

<?php include("head.php"); ?>
<script src="valida_modulo_recensione.js" type="text/javascript"></script>

<body>
    <?php include("header.php"); ?>
    <div class="content">
        <div class="column_left">
            <h2> Dati squadra </h2>
            <?php if($output == "") { ?>

                <p>Nome: <?php echo $nome ?></p>
                <?php } else { ?>
                <p><?php echo $output ?></p>
                <?php } ?>
            </div>
        <div class="column_middle">
            <h2> Recensioni </h2>
            <form method="POST" action="squadra.php?id=<?php echo $id ?>" onSubmit="return validaModuloRecensione(this);">
                <input type="text" id="titolo" name="titolo" placeholder="Titolo"/>
                <textarea type="textarea" id="testo" name="testo" placeholder="Testo"></textarea>
                <button type="submit">Scrivi una nuova recensione</button>
            </form>
            <br />
            <br />
            <?php 
                foreach($recensioni as $rec){
                    echo "<div class='rec'>
                    <h4>" . $rec['titolo'] . "</h4>
                    <p>" . $rec['testo'] . "</p>
                    <small>Scritta da " . $rec['nome'] . " il " . $rec['data_rec'] . "</small>
                    </div>";
                }
            ?>
        </div>
        <div class="column_right">
            <h2> Immagine squadra </h2>
            <img class='logo' src="./assets/images/<?php echo $immagine ?>"  />
        </div>

    </div>
    <?php include("footer.html"); ?>
</body>

</html>