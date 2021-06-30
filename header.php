<?php

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
$autenticato = !empty($_SESSION["email"]);

?>
<img id="sitelogo" src="./assets/images/logo.png" alt="logo" />

<div class="menu">
    <a href="index.php">Home&nbsp;<i class="fa fa-home"></i></a>
    <a href="news.php">News&nbsp;<i class="fa fa-newspaper-o"></i></a>
    <a href="squadre.php">Squadre&nbsp;<i class="fa fa-futbol-o" aria-hidden="true"></i></i></a>
    <a href="team.php">Il nostro team&nbsp;<i class="fa fa-users" aria-hidden="true"></i></a>
    <?php
    if ($autenticato) {
        echo "<a href='profilo.php'>Profilo &nbsp;<i class='fa fa-user-circle' aria-hidden='true'></i></a>";
        echo "<a href='logout.php'>Esci &nbsp;<i class='fa fa-sign-out' aria-hidden='true'></i></a>";
    } else {
        echo "<a href='login.php'>Login &nbsp;<i class='fa fa-sign-in' aria-hidden='true'></i></a>";
    }
    ?>
</div>