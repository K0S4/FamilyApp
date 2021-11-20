<html>

  <head>
    <meta charset="utf-8" />
    <title>FamilyApp</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styleMain.css" />
  </head>
  <body>
    <div class="header">
      <a onclick="hideMenu()"
        ><img class="menu-icon" src="img/menu_icon.svg" width="50px" alt="menu"
      /></a>
      <h1 class="title">FamilyApp</h1>
    </div>
    <div class="dropdown">
      <div class="menu-hiden dropdown-content" id="menu">
        <div class="menu-content">
          <p class="user-name">Szymon Karpiel</p>
          <div>
    <?php

        <?php
            if (!isset($_COOKIE['user'])) {
                header("Refresh: 0; url = login.php");
            }
        ?>
        <div class="logo">

        <div class="header">
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
                echo "<a href = 'login.php' class='log-in-out'><button>Login</button></a>";
            } else {
                echo "<form action = 'logout.php' method='post'>
                      <input class='log-in-out' type = 'submit' value = 'Logout' name = 'logout'> 
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
      </div>
    </div>
    <div class="main">
      <div class="element">
        <h2 class="element-title">Śmieci</h2>
        <p class="element-description">Wynieś czarosa</p>
        <p class="element-time">Time left: 1:58</p>
      </div>
      <hr />
      <div class="element">
        <h2 class="element-title">Zmywarka</h2>
        <p class="element-description">Wypakuj czy coś xd</p>
        <p class="element-time">Time left: 1:58</p>
      </div>
      <hr />
      <div class="element">
        <h2 class="element-title">Zakupy</h2>
        <p class="element-description">description</p>
        <ul class="list">
          <li class="list-element">Mleko</li>
          <li class="list-element">Chleb</li>
          <li class="list-element">Woda</li>
          <li class="list-element">Sos czarosa</li>
        </ul>
        <p class="element-time">Time left: 1:58</p>
      </div>
      <hr />
      <div class="element">
        <h2 class="element-title">Title</h2>
        <p class="element-description">description</p>
        <p class="element-time">Time left: 1:58</p>
      </div>
    </div>
    <script>
      function hideMenu() {
        let menu = document.getElementById("menu");
        menu.classList.toggle("menu-hiden");
        console.log("menu");
      }
    </script>
  </body>
</html>