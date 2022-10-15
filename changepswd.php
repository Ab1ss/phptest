<?php
session_start();

if (isset($_COOKIE['1'])) {
    if (!$_SESSION['user']) {
        header('Location: /');
    }
}else {
    header('Location: /');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Смена пароля</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
    <form action="vendor/passchange.php" method="post">
        <label>Введите старый пароль</label>
        <input type="password" name="old_password" placeholder="Введите старый пароль">
        <label>Введите новый пароль</label>
        <input type="password" name="new_password" placeholder="Введите новый пароль">
        <label>Введите новый пароль</label>
        <input type="password" name="new_password_confirm" placeholder="Введите новый пароль">
        <button type="submit">Сменить пароль</button>
        <?php
        if ($_SESSION['message']) {
            echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
        }
        unset($_SESSION['message']);
        ?>
    </form>
    <form action = "../profile.php">
        <button type = "submit">Назад</button>

    </form>
</body>
</html>
