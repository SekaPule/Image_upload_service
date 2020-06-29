<?php
    require_once ("lib/User.php");
    $userObj = new User("user");


    if (isset($_POST["start"])){
        $login = $_POST["username"];
        $password = $_POST["password"];
        $user = $userObj->getUserWhereLogin($login);
        $_SESSION["User_ID"]= $user['id'];
        $_SESSION["User_name"]=$login;

        if ($user != null){
            if(password_verify($password, $user['password'])){
                header('Location: Lenta.php');
            }
        }
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
    <form class="box" method="post" enctype="multipart/form-data">
        <h1>login</h1>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" name="start" value="OK">
        <a class="registration" href="registration.php">registration</a>
    </form>
</body>
</html>
