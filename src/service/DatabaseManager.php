<?php
/**
 * Created by PhpStorm.
 * User: Maria
 * Date: 28.05.2016
 * Time: 12:48
 */

namespace service;


class DatabaseManager
{
    function getConnection()
    {
        $conn = mysqli_connect('localhost', '', 'coderdojodb');

        if (!$conn) {

            die("Connection failed:" . mysqli_connect_error());

        }
        return $conn;
    }

    function closeConnection($connection)
    {
        mysqli_close($connection);
    }
}

?>