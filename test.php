<?php 
    var_dump($_GET);
    var_dump($_POST);

    if (!empty($_POST)) {
        $email = $_POST["email"];
        echo $_POST['email'];
    }
    

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="email">Email</label>
        <input type="text" id="email" name="email">
        <input type="submit" value="Login">
    </form>
</body>
</html>