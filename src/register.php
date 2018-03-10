<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="css/boostrap.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <title>Register</title>
</head>
<body>
<form method="post" action="logic/register_logic.php">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-5 col-md-3">
                <div class="form-login">
                    <h4>Introduceti datele de utilizator pentru inregistrare</h4>
                    <input type="text" name="nume" class="form-control input-sm chat-input" placeholder="Nume" required="required" />
                    </br>
                    <input type="text" name="prenume" class="form-control input-sm chat-input" placeholder="Prenume" required="required" />
                    </br>
                    <input type="text" name="username" class="form-control input-sm chat-input" placeholder="Username" required="required" />
                    </br>
                    <input type="email" name="email" class="form-control input-sm chat-input" placeholder="Email" required="required" />
                    </br>
                    <input type="tel" name="telefon" class="form-control input-sm chat-input" placeholder="Telefon" required="required" />
                    </br>
                    <input type="password" name="parola" class="form-control input-sm chat-input" placeholder="Parola" required="required" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Parola trebuie sa contina macar 6 semne' : ''); if(this.checkValidity()) form.password_two.pattern = this.value;" />
                    </br>
                    <input type="password" name="parola2" class="form-control input-sm chat-input" placeholder="Confirma parola" required="required" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Introduceti aceeasi parola ca mai sus' : '');"/>
                    </br>
                    <div class="wrapper">
            <span class="group-btn">
                <input name="submit" type="submit" value="Submit" class="btn btn-primary btn-md">
            </span>
                    </div>
                </div>

            </div>
        </div>
    </div>

<!--</form method="post" action="logic/register_logic.php">-->
<!---->
<!--    <p>Introduceti datele de utilizator pentru inregistrare</p>-->
<!--    <form method="post" action="logic/register_logic.php">-->
<!--        <p>Nume: </p></p><input type="text" name="nume" required="required"/><br>-->
<!--        <p>Prenume: </p><input type="text" name="prenume" required="required"/><br>-->
<!--        <p>Username: </p><input type="text" name="username" required="required"/><br>-->
<!--        <p>Email: </p><input type="email" name="email" required="required"/><br>-->
<!--        <p>Telefon: </p><input type="tel" name="telefon" required="required"/><br>-->
<!--        <p>Parola: </p><input type="password" name="parola" required="required" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Parola trebuie sa contina macar 6 semne' : ''); if(this.checkValidity()) form.password_two.pattern = this.value;"/>-->
<!--        <p>Confirma parola: </p><input type="password" name="parola2" required="required" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Introduceti aceeasi parola ca mai sus' : '');"/>-->
<!---->
<!--    </form>-->
    <?php
    session_start();

    if (isset ($_SESSION['message_error'])){
        printf("<br/> <p>%s</p>", $_SESSION['message_error']);
    }
    ?>
</body>
</html>