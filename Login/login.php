<?php
//include('../login/db.php');
session_start();
{
    //$connection=getConnection();
    $user=mysqli_real_escape_string($connection, $_POST['username']);
    $pass=mysqli_real_escape_string($connection, $_POST['password']);
//    echo $_POST['username'];
//    echo $_POST['password'];
    //$fetch=mysqli_query($connection, "SELECT id FROM `login2` WHERE username='$user' AND password='$pass'");
    //echo $fetch;
    $count=mysqli_num_rows($fetch);
    //echo "$count";
    if($count!="")
    {
        //session_register("sessionusername");
        $_SESSION['login_username']=$user;
        header("Location:profile.php");
    }
//    else
//    {
//        header('Location:error.php');
//    }

}
?>