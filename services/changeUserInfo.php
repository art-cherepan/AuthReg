<?php

if (!isset($_SESSION)) {
    session_start();
}

require_once __DIR__ . '/../classes/Models/User.php';
require_once __DIR__ . '/../classes/Models/Users.php';

if (empty($_POST['firstName'])) {
    ?>
    <script>
        alert('Не передано имя пользователя');
        window.location.href = "/AuthReg/index.php";
    </script> <?php
} elseif (empty($_POST['secondName'])) {
    ?>
    <script>
        alert('Не передана фамилия пользователя');
        window.location.href = "/AuthReg/index.php";
    </script> <?php
} elseif (empty($_POST['patronymic'])) {
    ?>
    <script>
        alert('Не передано отчество пользователя');
        window.location.href = "/AuthReg/index.php";
    </script> <?php
} elseif (empty($_POST['email'])) {
    ?>
    <script>
        alert('Не передан email пользователя');
        window.location.href = "/AuthReg/index.php";
    </script> <?php
} elseif (empty($_POST['userName'])) {
    ?>
    <script>
        alert('Не передан логин пользователя');
        window.location.href = "/AuthReg/index.php";
    </script> <?php
} elseif (empty($_POST['passwordOld'])) {
    ?>
    <script>
        alert('Не передан старый пароль пользователя');
        window.location.href = "/AuthReg/index.php";
    </script> <?php
} elseif (empty($_POST['passwordNew'])) {
    ?>
    <script>
        alert('Не передан новый пароль пользователя');
        window.location.href = "/AuthReg/index.php";
    </script> <?php
} else {
    $users = new Users();
    if (true == $users->checkPassword($_SESSION['userName'], $_POST['passwordOld'])) {
        $passwordHash = password_hash($_POST['passwordNew'], PASSWORD_DEFAULT);
        $userId = $users->getIdByUserName($_SESSION['userName']);
        $user = $users->getUser($userId);
        $user->setFirstName($_POST['firstName']);
        $user->setSecondName($_POST['secondName']);
        $user->setPatronymic($_POST['patronymic']);
        $user->setPasswordHash($passwordHash);
        if (true == $user->update()) {
            ?>
            <script>
                alert('Данные пользователя успешно обновлены');
                window.location.href = "/AuthReg/index.php";
            </script> <?php
        } else {
            ?>
            <script>
                alert('Произошла ошибка при обновлении данных');
                window.location.href = "/AuthReg/index.php";
            </script> <?php
        }
    } else {
        ?>
        <script>
            alert('Текущий пароль не подходит');
            window.location.href = "/AuthReg/index.php";
        </script> <?php
    }
}
