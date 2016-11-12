<?php
session_start();
include('../service/DatabaseManager.php');
if(isset($_REQUEST['submit']))
{
//    if($_REQUEST['name']=='' || $_REQUEST['password']==''|| $_REQUEST['password_two']=='')
//    {
//        echo "please fill the empty field.";
//    }


    $sql="insert into utilizator(nume, prenume, username, email, telefon, parola, data_inregistrarii) values
('$_REQUEST[nume]', '$_REQUEST[prenume]', '$_REQUEST[username]', '$_REQUEST[email]', '$_REQUEST[telefon]', '$_REQUEST[parola]', now())";
    $connection=getConnection();
    $result=mysqli_query($connection, $sql);
    if($result === true)
    {
        echo "Record successfully inserted";
        header("Location:../login.php");
    }
    else
    {
        echo "There is some problem in inserting record: " . mysqli_error($connection);
        $_SESSION['message_error'] = "There's a problem registering. Please try again!";

        header("Location:../register.php");
    }
    closeConnection($connection);
}
