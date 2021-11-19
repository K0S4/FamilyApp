<!DOCTYPE html>
<?php
    if (isset($_COOKIE['user'])) {
        header("Refresh: 0; url='index.php'");
    }
?>
<html>
    <head>
        <meta name = 'viewport' content = "width=device-width, initial-scale=1.0">
        <meta charset = 'utf-8'>
    </head>
    <body>
        <form action = '' method = 'POST'>
            <input type = 'text' name = 'login' placeholder = "login..."> <br>
            <input type = 'password' name = 'pass' placeholder = "hasło..."> <br>
            <input type = 'submit' name = 'submit' value = 'Zaloguj'> <br>
        </form> 
        <a href = 'register.php'>Nie posiadasz konta? Utwórz je</a> <br>
        <?php
            include 'config.php';
            if (!empty($_POST['login']) && !empty($_POST['pass'])) {
                if ($conn) {
                    $query = "SELECT login, pass FROM users";
                    $result = mysqli_query($conn, $query);
                    $i = 0;
                    $j = 0;
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            if ($row["login"] == $_POST['login']) {
                                if ($row["pass"] == sha1($_POST["pass"])) {
                                    $i++;
                                    $login = $row["login"];
                                } else {
                                    echo "Źle wprowadzone hasło";
                                    $j++;
                                }
                            }
                        }
                        if ($i == 1) {
                            echo "Zalogowano";
                            echo "<script>           
                            let f = new FormData();
                            f.append('log', '$login');
                            fetch ('cookies.php', {
                                method: 'POST',
                                body: f
                            });
                            </script>";
                            header("Refresh: 0; url='index.php'");
                        } elseif ($j == 0) {
                            echo "Nie istnieje taki użytkownik";
                        }
                    } else {
                        echo "Nie istnieje taki użytkownik";
                    }
                } else {
                    echo "Nie udalo się połączyć z bazą danych";
                }
            } else {
                echo 'Wprowadź prawidłowo login i hasło';
            }
        ?>
    </body>
</html>