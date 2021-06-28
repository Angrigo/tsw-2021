<!DOCTYPE html>
<html>

<?php include("head.php"); ?>

<body>
    <?php include("header.php"); ?>
    <div class="content">
        <div class="column_left">
            <h2> Registrati </h2>
        </div>
        <div class="column_middle">
            <p>
            <h3>Registrazione</h3>
            </p>
            <form method="post" action="registrati.php">
                <p>
                    <label for="firstname">Nome
                        <input type="text" name="firstname" id="firstname" />
                    </label>
                </p>
                <p>
                    <label for="lastname">Cognome
                        <input type="text" name="lastname" id="lastname" />
                    </label>
                </p>
                <p>
                    <label for="email">Email
                        <input type="text" name="email" id="email" />
                    </label>
                </p>
                <p>
                    <label for="password">Password
                        <input type="password" name="password" id="password" />
                    </label>
                </p>
                <p>
                    <input type="submit" name="invia" value="Registrati" />
                </p>
            </form>

            <p> Sei gi&agrave; un utente? <a href="login.php">Effettua il login!</a></p>
        </div>
        <div class="column_right">

        </div>
    </div>
    <?php include("footer.html"); ?>
</body>

</html>