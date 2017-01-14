<?php
/**
 * Created by PhpStorm.
 * User: cioba
 * Date: 10-Dec-16
 * Time: 12:00 PM
 */
session_start();
session_destroy();
header("location: ../login.php");