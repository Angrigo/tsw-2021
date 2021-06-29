<?php
	session_start();
	//Se la variabile username è vuota, l'utente non ha effettuato l'accesso
	if(empty($_SESSION["email"])){
		echo "<p>Pagina riservata agli utenti registrati. <br/> Effettua il <a href=\"login.php\">Login</a> oppure <a href=\"registrati.php\">Registrati</a> per continuare</p>";
	}
	else{
		$user = $_SESSION["email"];
		echo "<p> Benvenuto $user!</p>";
	?>
		<p>Questa immagine è visibile solo agli utenti loggati.</p>
		<img src="html.jpg"/>
		<p>
			<a href="logout.php">Logout</a>
		</p>
	<?php
	}
	?>