<?php
/**
 * Created by PhpStorm.
 * User: Cris's Work
 * Date: 3/26/2017
 * Time: 12:11 PM
 */
    include_once("../service/SessionService.php");
    session_start();
    if($_POST['action'] == 'Inscrie'){
        SessionService::subscribe_user_to_session($_POST["id"], $_SESSION["user"]);
    } else {
        SessionService::unsubscribe_user_to_session($_POST["id"], $_SESSION["user"]);
    }
