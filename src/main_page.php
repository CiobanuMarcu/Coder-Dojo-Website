<html>
    <head>
        <link rel="stylesheet" href="css/main.css">
        <title>Main page</title>
    </head>
    <body>
    <div class="user_menu_container">
        <?php
            session_start();
        if (!isset ($_SESSION['user'])){
            header('Location: ../login.php');
    //        echo "Bun-venit,". $_SESSION['user'];
            printf("Bun-venit, %s", $_SESSION['user']);
        }

        else{
            include_once ('view/meniu.php');
            printf("Bun-venit, %s", $_SESSION['user']);
            include_once("service/SessionService.php");
            SessionService::get_next_sessions();
        }
        ?>
            <p><a href="../src/logic/logout_logic.php">Logout</a></p>
    </div>
    </body>
</html>