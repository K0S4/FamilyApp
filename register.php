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
        <link rel="stylesheet" href="style_register.css">
    </head>
    <body>
        <form action = '' method = 'POST'>
            <input type = 'text' name = 'login' placeholder = "login..." required> <br>
            <input type = 'password' name = 'pass' placeholder = "hasło..." required> <br>
            <input type = 'radio' name = 'parent' value = 'Rodzic' required> Rodzic
            <input type = 'radio' name = 'parent' value = 'Dziecko' required> Dziecko <br>
            <input type = 'number' name = 'family' placeholder = 'id rodziny' required> <br>
            <input type = 'text' name = 'family_name' placeholder = 'Wprowadź nazwę rodziny' required> <br>
            <input type = 'submit' name = 'submit' value = 'Zarejestruj'> <br>
        </form>
        <?php
            include 'config.php';
            if (!empty($_POST['login']) && !empty($_POST['pass']) && !empty($_POST['family']) && !empty($_POST['parent'])) {
                if ($conn) {
                    $query1 = "SELECT id, family_name FROM families"; 
                    $result = mysqli_query($conn, $query1);
                    $i = 0;
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            if ($row["id"] == $_POST['family']) {
                                $i++;
                            } 
                        }
                    }
                    $family_id = $_POST['family'];
                    if ($i == 0) {
                        $n = $_POST['family_name'];
                        $query2 = "INSERT INTO families VALUES ($family_id, '$n')";
                        if (mysqli_query($conn, $query2)) {
                            echo "New record created successfully";
                        } else {
                            echo "Error: " . $query2 . "<br>" . mysqli_error($conn);
                        }  
                    }
                    $log = $_POST['login'];
                    $pass = sha1($_POST['pass']);
                    if ($_POST['parent'] == 'Rodzic') {
                        $parent = 1;
                    } else {
                        $parent = 0;
                    }
                    $query3 = "INSERT INTO users VALUES ('', '$log', '$pass', $parent, $family_id)";
                    if (mysqli_query($conn, $query3)) {
                        header("Refresh: 0; url='login.php'");
                    }
                }
            } else {
                if (isset($_POST['login']) || isset($_POST['pass']) || isset($_POST['parent']) || isset($_POST['family']) || isset($_POST['family_name'])) {
                    echo "Wprowadź wszystkie dane";
                }
            }
        ?>
    </body>
</html>