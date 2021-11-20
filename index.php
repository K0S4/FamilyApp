<html>
    <head>
        <meta charset="utf-8">
        <title>FamilyApp</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styleMain.css">
    </head>
    <body>
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
                //echo "<a href = 'login.php'><button>Zaloguj się</button></a>";
            } else {
                echo "<form action = 'logout.php' method='post'>
                      <input type = 'submit' value = 'Wyloguj' name = 'logout'> 
                      </form>";
            }

        ?>
        <div class="main">
            <div class="element">
                <h2 class="element-title">Śmieci</h2>
                <p class="element-description">Wynieś czarosa</p>
                <p class="element-time">Time left: 1:58</p>
            </div>  
            <hr>
            <div class="element">
                <h2 class="element-title">Zmywarka</h2>
                <p class="element-description">Wypakuj czy coś xd</p>
                <p class="element-time">Time left: 1:58</p>
            </div>  
            <hr>
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
            <hr>
            <div class="element">
                <h2 class="element-title">Title</h2>
                <p class="element-description">description</p>
                <p class="element-time">Time left: 1:58</p>
            </div>
        </div>
    </body>
</html>