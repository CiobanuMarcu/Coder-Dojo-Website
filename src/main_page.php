<?php
// Start the session
session_start();
?>
<html>
<head>
    <link rel="stylesheet" href="css/main.css">
    <title>Main page</title>
</head>
<body>
<?php
if (!isset ($_SESSION['user'])) {
    header('Location: ../login.php');
} else {
    printf("<div class=\"meniu_header\">");
    include_once('view/meniu.php');
    printf("<div class=\"user_menu_container\"> <p>Welcome, %s </p>", $_SESSION['user']);
    printf("<p><a href=\"logic/logout_logic.php\">Logout</a></p></div>");
    printf("</div>");
    include_once("service/SessionService.php");
    $sessions = SessionService::get_next_sessions();
    printf("<table class='session-table'>");
    printf("<tr><th>Data</th> <th>Ora</th> <th>Locatia</th> <th>Descriere</th> <th>Inscris</th></td></tr> ");
    foreach ($sessions as $s) {
        printf("<tr>");
        printf("<td>%s</td>", $s->data);
        printf("<td>%s</td>", $s->ora);
        printf("<td>%s</td>", $s->locatia);
        printf("<td>%s</td>", $s->descriere);
        if (SessionService::is_subscribed($s->data, $_SESSION['user'])) {
            printf("<td><input type='button' value='Renunta' id='$s->data' class='subscribe-button'/></td>");
        } else {
            printf("<td><input type='button' class='subscribe-button' id='$s->data' value='Inscrie'/></td>");
        }
//                printf("\n data %s,ora %s, locatia %s, descriere %s,\n", $s -> data, $s -> ora, $s -> locatia, $s -> descriere);
        printf("</tr>");
    }
    printf("</table>");
}
?>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>