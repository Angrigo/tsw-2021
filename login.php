<!DOCTYPE html>
<html>

<?php include("head.php"); ?>

<body>
    <?php include("header.php"); ?>
    <div class="content">
        <div class="column_left">
            <h2> Login </h2>
        </div>
        <div class="column_middle">
            <p>
            <h3>Effettua il login</h3>
            </p>
            <form method="post" action="login_manager.php">
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
                    <input type="submit" name="invia" value="Login" />
                </p>
            </form>

            <p> Nuovo utente? <a href="registrati.php">Registrati!</a></p>
        </div>
        <div class="column_right">

        </div>
    </div>
    <?php include("footer.html"); ?>
</body>

</html>