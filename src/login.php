<html>
    <head>
        <title>Login to Optymyze Coder Dojo</title>
        <link rel="stylesheet" href="css/main.css">
    </head>
<body>
    <form class="login_form" method="post" action="logic/login_logic.php">
        <h2>Login</h2>

        <input type="submit" id="submit" name="submit" value="Login"/>
        <div class="field-set">
                <label>username</label>
                <input type="text" name="username"/>
        </div>
        <div class="field-set">
            <label>password</label>
            <input type="password" name="password"/>
        </div>
    </form>
</body>
</html>