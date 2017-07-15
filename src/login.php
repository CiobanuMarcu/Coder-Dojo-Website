<html>
    <head>
        <title>Login to Optymyze Coder Dojo</title>
        <link rel="stylesheet" href="css/main.css">
    </head>
<body>
    <form class="login_form" method="post" action="logic/login_logic.php">
        <h2>Login</h2>
        <div class="field-set">
            <div class="username-wrapper">
                <label>username</label>
                <input type="text" name="username"/>
            </div>
            <div class="password-wrapper">
                <label>password</label>
                <input type="password" name="password"/>
            </div>
        </div>
        <input type="submit" id="submit" name="submit" value="Login"/>
    </form>
</body>
</html>