<?php

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
$autenticato = !empty($_SESSION["email"]);

?>

<img id="sitelogo" src="./assets/images/logo.png" alt="logo" />

<div class="menu">
    <a href="index.php">Home</a>
    <a href="europei.php">Europei</a>
    <a href="news.php">News</a>
    <a href="squadre.php">Squadre</a>
    <a href="team.php">Il nostro team</a>
    <?php
    if ($autenticato) {
        echo "<a href='profilo.php'>Profilo</a>";
        echo "<a href='logout.php'>Esci</a>";
    } else {
        echo "<a href='login.php'>Login</a>";
    }
    ?>
</div>