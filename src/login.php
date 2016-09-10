<?php
include_once('myView.php');
$t = new MyView();
$t->title = 'Login to Optymyze Coder Dojo';
$t->render('login.php');
?>