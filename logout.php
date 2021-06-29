<?php
 	/* attiva la sessione */
	session_start();
	/* sessione attiva, la distrugge */
	$sname=session_name();
	session_destroy();
	/* ed elimina il cookie corrispondente */
	if (isset($_COOKIE['login'])) { 
		setcookie($sname,'', time()-3600,'/');
	}
	echo "<p> Logout effettuato. Ciao ".$_SESSION["email"]." </p>";
	echo "<p>Torna alla <a href=\"login.php\">Home</a></p>";

?>