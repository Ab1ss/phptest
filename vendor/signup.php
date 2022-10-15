<?php

    session_start();
    require_once 'connect.php';

    $login = $_POST['login'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    if ($password === $password_confirm) {

        $hashedpassword = password_hash($password, PASSWORD_DEFAULT);

        mysqli_query($connect, "INSERT INTO `users` (`id`, `login`, `password`) VALUES (NULL, '$login', '$hashedpassword')");

        $_SESSION['message'] = 'Регистрация прошла успешно!';
        header('Location: ../index.php');


    } else {
        $_SESSION['message'] = 'Пароли не совпадают';
        header('Location: ../register.php');
    }

?>
