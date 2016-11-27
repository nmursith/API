<!DOCTYPE html>
<html lang ="en">

<head>
    <title>	HTML template</title>
    <meta name="viewport" content="width=device-width, initial-scale = 1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>

<body>

<form name ="login" method="POST" action ="../add_user.php">

    <label>First Name:</label><input name="first_name" type="text"></br>
    <label>Last Name:</label><input name="last_name" type="text"></br>
    <label>E-mail:</label><input name="email" type="email"></br>
    <label>Username:</label><input name="username" type="text"></br>
    <label>Password:</label><input name="password" type="password"></br>
    <input name="active" type="hidden" value="1">
    <input name="addnewuser" type="submit" value="Add User">

</form>

<script type="text/javascript" src ="https://code.jquery.com/jquery.js"></script>
<script type="text/javascript" src ="js/bootstrap.min.js"></script>

</body>
</html>