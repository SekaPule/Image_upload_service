<?php
    require_once ("lib/User.php");
    $userObj = new User("user");

    if (isset($_POST["start"])){
        $login = $_POST["username"];
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $userObj->AddUser($login, $password);
        header("Location: index.php");
    }
 ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<form class="box" method="post" enctype="multipart/form-data">
		<h1>registration</h1>
	 	<input type="text" name="username" placeholder="Username">
		<input type="password" name="password" placeholder="Password">
		<input type="submit" name="start" value="OK">
		<a class="registration" href="index.php">login</a>
	</form>
</body>
</html>