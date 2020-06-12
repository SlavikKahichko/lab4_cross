<html lang="ru">
<head>
    <title>Изм. личн. настроек</title>
</head>
<body>
<?php
session_start();
$connect = mysqli_connect('localhost', 'root' , '','lab3');
$sql = mysqli_query($connect, "SELECT `id`, `name`, `surname`,`login`,`password`,`lang`,`role` FROM `users` WHERE `id`={$_GET['edit']}");
$log = $_SESSION['login'];
$pas = $_SESSION['password'];

if (isset($_POST["Name"])) {

    if (isset($_GET['edit'])) {
        $sql = mysqli_query($connect, "SELECT `id`, `name`, `surname`,`login`,`password`,`lang`,`role` FROM `users` WHERE `id`={$_GET['edit']}");
        $sql = mysqli_query($connect, "UPDATE `users` SET `name` = '{$_POST['Name']}',`surname` = '{$_POST['Surname']}',`login` = '{$_POST['Login']}',
                                                            `password` = '{$_POST['Password']}',`lang` = '{$_POST['Language']}' WHERE `id`={$_GET['edit']}");
    } else {

        $sql = mysqli_query($connect, "INSERT INTO `users` (`name`, `surname`,`login`,`password`,`lang`,`role`) VALUES ('{$_POST['Name']}', '{$_POST['Surname']}','{$_POST['Login']}',
                                                            '{$_POST['Password']}','{$_POST['Language']}')");
    }

    if ($sql) {
        echo '<p>Успешное изменение!</p>';
    } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($connect) . '</p>';
    }
}

if (isset($_GET['edit'])) {
    $sql = mysqli_query($connect, "SELECT `id`, `name`, `surname`,`login`,`password`,`lang`,`role` FROM `users` WHERE `id`={$_GET['edit']}");
    $user = mysqli_fetch_array($sql);
}
?>
<form action = "" method = "post" >
    <table >
        <tr >
            <td > Name:</td >
            <td ><input type = "text" name = "Name" value = "<?= isset($_GET['edit']) ? $user['Name'] : ''; ?>" ></td >
        </tr >
        <tr >
            <td > Surname:</td >
            <td ><input type = "text" name = "Surname" value = "<?= isset($_GET['edit']) ? $user['Surname'] : ''; ?>" ></td >
        </tr >
        <tr >
            <td > Login:</td >
            <td ><input type = "text" name = "Login" value = "<?= isset($_GET['edit']) ? $user['Login'] : ''; ?>" ></td >
        </tr >
        <tr >
            <td > Password:</td >
            <td ><input type = "text" name = "Password" value = "<?= isset($_GET['edit']) ? $user['Password'] : ''; ?>" ></td >
        </tr >
        <tr >
            <td > Language:</td >
            <td ><input type = "text" name = "Language" value = "<?= isset($_GET['edit']) ? $user['Language'] : ''; ?>" ></td >
        </tr >
        <tr >
            <td colspan = "2" ><input type = "submit" value = "OK" ></td >
        </tr >
    </table >
</form >

<table border = '1' >
    <tr >
        <td > id</td >
        <td > Name</td >
        <td > Surname</td >
        <td > Login</td >
        <td > Password</td >
        <td > Language</td >
        <td > Редактирование</td >
    </tr >

    <?php
    $sql = mysqli_query($connect, "SELECT `id`, `name`, `surname`,`login`,`password`,`lang` FROM `users` WHERE `id` = {$_SESSION['user']['id']}");
    while ($result = mysqli_fetch_array($sql)) {
        echo '<tr>' .
            "<td>{$result['id']}</td>" .
            "<td>{$result['name']}</td>" .
            "<td>{$result['surname']}</td>" .
            "<td>{$result['login']}</td>" .
            "<td>{$result['password']}</td>" .
            "<td>{$result['lang']}</td>" .
            "<td><a href='?edit={$result['id']}'>Изменить</a></td>" .
            '</tr>';
    }
    ?>
</table>
</body>
</html>
