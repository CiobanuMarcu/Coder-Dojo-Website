<?php
//include('../login/db.php');
session_start();

{
    
    $connection = getConnection();
  
    $user = mysqli_real_escape_string($connection, $_POST['username']);
  
    $pass = mysqli_real_escape_string($connection, $_POST['parola']);
  
    echo $_POST['username'];
  
    echo $_POST['parola'];

    $fetch=mysqli_query($connection, "SELECT id FROM `coderdojo_db_1_0` WHERE username='$username' AND password='$parola'");

}

?>