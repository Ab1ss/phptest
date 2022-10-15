<?php

session_start();
require_once 'connect.php';

    $login = $_SESSION['user']['login'];
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $new_password_confirm = $_POST['new_password_confirm'];
    if($new_password == $new_password_confirm){
        $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login'");
        $user = mysqli_fetch_assoc($check_user);
        $pwd = $user['password'];
        if (mysqli_num_rows($check_user) > 0 && password_verify($old_password, $pwd)) {
            $hash_new_password = password_hash($new_password, PASSWORD_DEFAULT);
            mysqli_query($connect, "UPDATE users SET password = '$hash_new_password' WHERE login = '$login'");

            $_SESSION['message'] = 'пароль успешно изменен';
            header('Location: ../index.php');

        } else {
            $_SESSION['message'] = 'Старый пароль введен неверно';
            header('Location: ../changepswd.php');
        }
    } else {
        $_SESSION['message'] = 'пароли не совпадают';
        header('Location: ../changepswd.php');
    }
