<?php
/**
 * Created by PhpStorm.
 * User: MJ
 * Date: 27-Aug-16
 * Time: 10:56 AM
 */
session_start();

if(isset($_POST['submit']))
{

    include ('../service/UserService.php');
    var_dump($_POST);
    \service\UserService::user_connect($_POST['username'], $_POST['password']);
}

