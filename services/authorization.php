<?php

if (!isset($_SESSION)) {
    session_start();
}
require_once __DIR__ . '/../classes/Models/Users.php';
require_once __DIR__ . '/../classes/DB.php';

if (empty($_POST['userName'])) {
    ?>
    <script>
        alert('Введите логин');
        window.location.href = "/AuthReg/authorization.php";
    </script> <?php
} elseif (empty($_POST['password'])) {
    ?>
    <script>
        alert('Введите пароль');
        window.location.href = "/AuthReg/authorization.php";
    </script> <?php
} else {
    $users = new Users();
    if (true == $users->checkUserName($_POST['userName'])) {
        if (true == $users->checkPassword($_POST['userName'], $_POST['password'])) {
            $passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $_SESSION['userName'] = $_POST['userName'];
            $_SESSION['passwordHash'] = $passwordHash;
            ?>
            <script>
                alert('Вы успешно вошли на сайт!');
                window.location.href = "/AuthReg/index.php";
            </script> <?php
        } else {
            ?>
            <script>
                alert('Пароль неверный');
                window.location.href = "/AuthReg/authorization.php";
            </script> <?php
        }
    } else {
        ?>
        <script>
            alert('Логин неверный');
            window.location.href = "/AuthReg/authorization.php";
        </script> <?php
    }
}