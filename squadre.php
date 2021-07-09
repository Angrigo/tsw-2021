<?php
if(!isset($_SESSION)) 
    session_start();
$squadre = [];

$autenticato = $_SESSION && $_SESSION["email"];

require "db.php";
//CONNESSIONE AL DB
$db = pg_connect($connection_string) or die('Impossibile connettersi al database: ' . pg_last_error());
$sql = "SELECT id, nome, immagine FROM squadre ORDER BY data_creazione DESC";
if(!$autenticato) 
    $sql = $sql." LIMIT 10";
$ret = pg_query($db,$sql);
if (!$ret) {
    echo "ERRORE QUERY: " . pg_last_error($db);
    return false;
} else {
    while ($row = pg_fetch_assoc($ret)) {
        if($row) { //l'utente esiste
            array_push($squadre, $row);
        }
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
            
        </div>
        <div class="column_middle">
            <h2> Squadre </h2>
            <?php 
                foreach($squadre as $squadra){
                  
                    echo "<a href='squadra.php?id=". $squadra["id"] ."'>";
                 
                    echo "<div class='card-squadra fadeIn'><p>" . $squadra['nome'] . "</p>
                    <img class='logo' onclick='function_confirm()' src='./assets/images/".$squadra["immagine"]."' alt='logo " . $squadra['nome'] . "' />
                    </div>";
                  
                    echo "</a>";
            
                }
            ?>

        </div>  
        <div class="column_right">

        </div>
    </div>
    <?php include("footer.html"); ?>
</body>


</html>