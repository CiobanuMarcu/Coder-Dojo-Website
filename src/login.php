<?php session_start();?>
<html>
<head>
    <title>Login to Optymyze Coder Dojo</title>
    <link rel="stylesheet" href="css/boostrap.css">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->


    <!--Pulling Awesome Font -->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

</head>
<body>
<form class="login_form" method="post" action="logic/login_logic.php">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-5 col-md-3">
                <div class="form-login">
                    <h4>Login</h4>
                    <input type="text" name="username" id="userName" class="form-control input-sm chat-input" placeholder="username" />
                    </br>
                    <input type="password" name="password" id="userPassword" class="form-control input-sm chat-input" placeholder="password"     />
                    </br>
                    <div class="wrapper">
            <span class="group-btn">
                <input type="button"  onclick="location.href='register.php'" ; value="Register" class="btn btn-primary btn-md" />
                <input type="submit" id="submit" class="btn btn-primary btn-md" name="submit" value="Login" />
            </span>
                    </div>
                </div>

            </div>
        </div>
    </div>

</form>
<?php
if(isset($_SESSION['iserror']) && $_SESSION['iserror']=="true")
{
    echo '<div id="err">The username or password are incorrect!</div>';
    session_destroy();
}
?>
</body>
</html>