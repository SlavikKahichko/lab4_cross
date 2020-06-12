<?php
session_start();
include '..\data.php';
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
if ((!($_SESSION['role'] == 'manager')) && (!($_SESSION['role'] == 'admin'))) {
    session_destroy();
    header("Location: ..\index.php");
}
if (!(isset($_GET['lang']))) {
    for($i =0; $i<count($users); $i++) {
        if ($_SESSION['login'] == $users[$i]['login']) {
            echo $cong[0]['hi'] . " " . $users[$i]['name'] . " " . $users[$i]['surname'] . " " . $cong[0]['you'] . " " . $users[$i]['role'];
        }
    }
}

if (isset($_GET['lang'])) {
    for($j =0; $j<count($users); $j++) {
        if($_SESSION['login'] == $users[$j]['login']) {
            if ($_GET['lang'] == 'ru') {
                echo $cong[0]['hi'] . " " . $users[$j]['name'] . " " . $users[$j]['surname'] . " " . $cong[0]['you'] . " " . $users[$j]['role'];
            }
            if ($_GET['lang'] == 'ua') {
                echo $cong[1]['hi'] . " " . $users[$j]['name'] . " " . $users[$j]['surname'] . " " . $cong[1]['you'] . " " . $users[$j]['role'];
            }
            if ($_GET['lang'] == 'en') {
                echo $cong[2]['hi'] . " " . $users[$j]['name'] . " " . $users[$j]['surname'] . " " . $cong[2]['you'] . " " . $users[$j]['role'];
            }
        }
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

<form name = "test" action = "client.php" method = "post">
    <button><font color ="black">Client</font></button>
</form>
<form name = "test" action = "../options/list.php" method = "post">
    <button><font color ="black">Показать рабов</font></button>
</form>
