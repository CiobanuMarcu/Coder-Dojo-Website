<html>
    <head>
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
        printf("Bun-venit, %s", $_SESSION['user']);
    }
    ?>
        <p><a href="../logic/logout_logic.php">Logout</a></p>
    </body>
</html>