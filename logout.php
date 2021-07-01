<!DOCTYPE html>
<html>

<?php include("head.php"); ?>

<body>
    <?php include("header.php"); ?>
    <div class="content">
        <div class="column_left">
            <h2> Logout </h2>
        </div>
        <div class="column_middle">
		<?php
			/* attiva la sessione */
			if(!isset($_SESSION)) 
    			session_start();
			/* sessione attiva, la distrugge */
			$sname=session_name();
			session_destroy();
			/* ed elimina il cookie corrispondente */
			if (isset($_COOKIE['login'])) { 
				setcookie($sname,'', time()-3600,'/');
			}
			echo "<p> Logout effettuato. Ciao ".$_SESSION["nome"]." </p>";
			echo "<p>Torna alla <a href=\"index.php\">Home</a></p>";

		?>
		</div>
        <div class="column_right">

        </div>
    </div>
    <?php include("footer.html"); ?>
</body>

</html>