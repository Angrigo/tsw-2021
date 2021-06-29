<?php
session_start();
//Se la variabile username è vuota, l'utente non ha effettuato l'accesso
if (empty($_SESSION["email"])) {
	header("Location: login.php");
	die();
}
