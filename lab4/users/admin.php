<?php
session_start();
include '..\data.php';
$link = mysqli_connect('localhost', 'root' , '','lab3');

if($_GET["exit"]){
    session_destroy();
    header("Location: ..\index.php");
}

if (isset($_GET['lang'])){
    $_SESSION['lang'] = $_GET['lang'];
}

if (!(isset($_SESSION['login'])) && !(isset($_SESSION['password']))){
    session_destroy();
    header('Location: ..\index.php');
}
if (!($_SESSION['role'] == 'admin')) {
    session_destroy();
    header("Location: ..\index.php");
}
if(!(isset($_GET['lang']))) {
    if ($_SESSION['user']['lang'] == 'ru') {
        echo $cong[0]['hi'] . $_SESSION['user']['name'] . ' ' . $_SESSION['user']['surname'] . $cong[0]['you'] . " " . $_SESSION['user']['role'];
    } else if ($_SESSION['user']['lang'] == 'en') {
        echo $cong[0]['en'] . $_SESSION['user']['name'] . ' ' . $_SESSION['user']['surname'] . $cong[1]['en'] . " " . $_SESSION['user']['role'];
    } else if ($_SESSION['user']['lang'] == 'ua') {
        echo $cong[0]['ua'] . $_SESSION['user']['name'] . ' ' . $_SESSION['user']['surname'] . $cong[1]['ua'] . " " . $_SESSION['user']['role'];
    }
}

if(isset($_GET['lang'])){
    if($_GET['lang'] == 'ru'){
        echo $cong[0]['hi'] . " " . $_SESSION['user']['name'] . " " . $_SESSION['user']['surname'] . " " . $cong[0]['you'] . " " . $_SESSION['user']['role'];
    }
    if($_GET['lang'] == 'ua'){
        echo $cong[1]['hi'] . " " . $_SESSION['user']['name'] . " " . $_SESSION['user']['surname'] . " " . $cong[1]['you'] . " " . $_SESSION['user']['role'];
    }
    if($_GET['lang'] == 'en'){
        echo $cong[2]['hi'] . " " . $_SESSION['user']['name'] . " " . $_SESSION['user']['surname'] . " " . $cong[2]['you'] . " " . $_SESSION['user']['role'];
    }
}

?>
<form >
    <select name="lang" method="GET">
        <option value="ru">Русский</option>
        <option value="ua">Українська</option>
        <option value="en">English</option>
    </select>
    <input type="submit" value="Save">
</form>

<form method="GET">
        <input type="submit" name="exit"  value="Exit">
    </form>

    <form name = "test" action = "manager.php" method = "post">
        <button><font color ="black">Посмотреть как дела у мененджера</font></button>
    </form>
    <form name = "test" action = "client.php" method = "post">
        <button><font color ="black">Заглянуть к клиенту</font></button>
    </form>
    <form name = "test" action = "../options/adduseradmin.php" method = "post">
        <button><font color ="black">Добавить пользователя</font></button>
    </form>
    <form name = "test" action = "../options/list.php" method = "post">
        <button><font color ="black">Показать рабов</font></button>
    </form>
    <form name = "test" action = "../options/deleting.php" method = "post">
        <button><font color ="black">Удалить или изменить пользователя</font></button>
    </form>
