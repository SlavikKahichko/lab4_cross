<?php
session_start();
$connect = mysqli_connect('localhost', 'root' , '','lab3');
$login = $_POST['login'];
$password = $_POST['password'];

$users_bd = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password' ");
$_SESSION['check_user'] = $users_bd;
$user = mysqli_fetch_assoc($users_bd);

$_SESSION['user'] = array("id" => $user['id'], "name" => $user['name'], "surname" => $user['surname'], "login" => $user['login'], "password" => $user['password'], "role" => $user['role'], "lang" => $user['lang']);


if(mysqli_num_rows($users_bd) >0)
if($user['role'] == 'admin'){
    $_SESSION['login'] = $login;
    $_SESSION['password'] = $password;
    $_SESSION['role'] = $user['role'];
    header('location: users/admin.php');
}else if ($user['role'] == 'manager'){
    $_SESSION['login'] = $login;
    $_SESSION['password'] = $password;
    $_SESSION['role'] = $user['role'];
    header('location: users/manager.php');
}else if ($user['role'] == 'client'){
    $_SESSION['login'] = $login;
    $_SESSION['password'] = $password;
    $_SESSION['role'] = $user['role'];
    header('location: users/client.php');
}