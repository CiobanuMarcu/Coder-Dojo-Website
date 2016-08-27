<?php
/**
 * Created by PhpStorm.
 * User: Maria
 * Date: 28.05.2016
 * Time: 12:48
 */


function getConnection()
{
    $conn = mysqli_connect('localhost', 'root', '', 'coderdojo');

    if (!$conn) {

        die("Connection failed:" . mysqli_connect_error());

    }
    return $conn;
}

function closeConnection($conn)
{
    mysqli_close($conn);
}


