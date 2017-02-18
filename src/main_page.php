<html>
    <head>
        <link rel="stylesheet" href="css/main.css">
        <title>Main page</title>
    </head>
    <body>
        <?php
            session_start();
        if (!isset ($_SESSION['user'])){
            header('Location: ../login.php');
    //        echo "Bun-venit,". $_SESSION['user'];
            printf("Bun-venit, %s", $_SESSION['user']);
        }

        else{
            include_once ('view/meniu.php');
            printf("<div class=\"user_menu_container\"> <p>Bun-venit, %s </p>", $_SESSION['user']);
            printf("<p><a href=\"../src/logic/logout_logic.php\">Logout</a></p></div>");
            include_once("service/SessionService.php");
            SessionService::get_next_sessions();
        }
        ?>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"/>

        <script src="js/main.js"></script>
    </body>
</html>