<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
//Se la variabile email è vuota, l'utente non ha effettuato l'accesso
if (empty($_SESSION["email"])) {
	header("Location: login.php"); // invia l'header al browser con la location dove deve reinderizzare
	die(); // interrompe lo script
}
