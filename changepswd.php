<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: /');
}
?>
    <<form action="vendor/passchange.php" method="post">>
        <label>Введите старый пароль</label>
        <input type="password" name="old_password" placeholder="Введите старый пароль">
        <label>Введите новый пароль</label>
        <input type="password" name="new_password" placeholder="Введите новый пароль">
        <label>Введите новый пароль</label>
        <input type="password" name="new_password_confirm" placeholder="Введите новый пароль">
    </form>