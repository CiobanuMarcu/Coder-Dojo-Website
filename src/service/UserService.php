<?php
/**
 * Created by PhpStorm.
 * User: Maria
 * Date: 11.06.2016
 * Time: 12:49
 */

namespace service;


use model\User;

class UserService
{
    function get_user_by ($username)
    {
        $user = new User();
        $user.$username = $username;
        printf("assigning %s\n", $user.$username);

        //$user.username = "cca";

        return $user;
    }
}