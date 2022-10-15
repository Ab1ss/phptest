<?php

    session_start();
    require_once 'connect.php';

    $login = $_POST['login'];
    $password = $_POST['password'];
    $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login'");
    $user = mysqli_fetch_assoc($check_user);
    $pwd = $user['password'];
        if (mysqli_num_rows($check_user) > 0 && password_verify($password, $pwd)) {
            $_SESSION['user'] = [
                "id" => $user['id'],
                "login" => $user['login']
            ];
            setcookie(1, "В ТЗ не скказанно записывать куки в БД", 0);
            header('Location: ../profile.php');
        } else {
            $_SESSION['message'] = 'Не верный логин или пароль';
            header('Location: ../index.php');
        }