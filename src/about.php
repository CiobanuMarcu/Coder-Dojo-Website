<?php
// Start the session
session_start();
?>
<html>
<head>
    <link rel="stylesheet" href="css/main.css">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <title>About page</title>
</head>
<body>
<?php
if(!isset ($_SESSION['user'])) {
    header('Location: ../login.php');
} else
{
    printf("<div class=\"meniu_header\">");
    include_once('view/meniu.php');
    printf("<div class=\"user_menu_container\"> <p>Welcome, %s </p>", $_SESSION['user']);
    printf("<p><a href=\"logic/logout_logic.php\">Logout</a></p></div>");
    printf("</div>");
}
?>
<p>Site realizat în cadrul Coder Dojo Optymyze Iași</p>
<p>Developeri:</p>
<ol>
    <li>Gavrilean Cristian</li>
    <li>Maftei Alexandra</li>
    <li>Marcu Ciobanu</li>
</ol>
<p>Coordonatori:</p>
<ol>
    <li>Daniel Leon</li>
</ol>
</body>
</html>