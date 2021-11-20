<html>
    <head>
        <meta charset="utf-8">
        <title>FamilyApp</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styleMain.css">
    </head>
    <body>
<<<<<<< HEAD
        <?php
            if (!isset($_COOKIE['user'])) {
                header("Refresh: 0; url = login.php");
            }
        ?>
        <div class="logo">
=======
        <div class="header">
>>>>>>> af7d46892691228787749c935bba0277b7d1d682
            <h1 class="title">FamilyApp</h1>
        </div>
        <div class="dropdown">
            <img class="menu_icon" src="img/menu_icon.svg" width="50px" alt="menu">
            <div class="dropdown_content">
                <p class="user_name">Szymon Karpiel</p>
                <p class="logInOut">Logout</p>
            </div>
        </div>
        <?php
            if (!isset($_COOKIE['user'])) {
                //echo "<a href = 'login.php'><button>Zaloguj się</button></a>";
            } else {
                echo "<form action = 'logout.php' method='post'>
                      <input type = 'submit' value = 'Wyloguj' name = 'logout'> 
                      </form>";
            }

        ?>
        <div class="main">
            <script>
                let date, d, date2, d2, time, time1, t;
            </script>
            <?php
            include 'config.php';
            if ($conn) {
                $id = $_COOKIE['user'];
                $query = "SELECT title, description, dt FROM quests WHERE user_id = $id";
                $result = mysqli_query($conn, $query);
                if (mysqli_num_rows($result) > 0) {
                    $i = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $title = $row['title'];
                        $description = $row['description'];
                        $dt = $row['dt'];
                        echo "<div class = 'element'>
                              <div class = 'element-title'>$title</div>
                              <div class = 'element-description'>$description</div>
                              <div class = 'element-time'>Termin: $dt</div>
                              </div>";
                              $i++;
                              if ($i != mysqli_num_rows($result)) {
                                  echo "<hr>";
                              }
                    }
                    
                }
            }
            ?>
        </div>
    </body>
</html>