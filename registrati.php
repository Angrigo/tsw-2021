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
            <form method="post" action="registrati_manager.php">
                <p>
                    <label for="name">Nome
                        <input type="text" name="nome" id="nome" />
                    </label>
                </p>
                <p>
                    <label for="email">Email
                        <input type="email" name="email" id="email" />
                    </label>
                </p>
                <p>
                    <label for="password">Password
                        <input type="password" name="password" id="password" />
                    </label>
                </p>
                <p>
                    <label for="repassword">Repassword
                        <input type="password" name="repassword" id="repassword" />
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