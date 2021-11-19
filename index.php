<!DOCTYPE html>
<html>
    <head>
        <meta name = 'viewport' content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php
            if (!isset($_COOKIE['user'])) {
                echo "<a href = 'login.php'>Zaloguj się</a>";
            } else {
                echo "<form action = 'logout.php' method='post'>
                      <input type = 'submit' value = 'Wyloguj' name = 'logout'> 
                      </form>";
            }

        ?>
    </body>
</html>