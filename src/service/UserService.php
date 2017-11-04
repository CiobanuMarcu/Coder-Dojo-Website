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
    static function user_connect ($name, $parola)
    {
        //establishing connection
        include ('DatabaseManager.php');
        $connection = getConnection();
        $query = sprintf ("SELECT * FROM utilizator WHERE username = '%s' AND parola = '%s'",
            mysqli_real_escape_string($connection, $name),
           sha1 (mysqli_real_escape_string($connection, $parola))
        );
        $result = mysqli_query($connection, $query);
        $rows = mysqli_num_rows($result);
        if($rows == 1)
        {
            $_SESSION["user"] = $_POST['username'];
            closeConnection($connection);
            header('Location: ../index.php');
        }
        else
        {
            echo 'The username or password are incorrect!';
            header('Location: ../login.php');
        }
        closeConnection($connection);
    }
}

