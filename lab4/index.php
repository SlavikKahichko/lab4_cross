<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login page</title>
</head>
<body>
<h1>Добро пожаловать, что бы зайти на сайт введите, пожалуйста, Ваш логин и пароль</h1>
<form action = "main.php" method = "post">
    <label>Login:   </label>
    <input type = "text" name = "login"><br />
    <label>Password: </label>
    <input type = "password" name = "password"><br />
    <input type="submit" name="send" value="LOGIN" class="button">
</form>
<form action = "options/adduser.php" method = "post">
    <input type="submit" name="send" value="Добавить пользователя" class="button">
</form>
</body>
</html>