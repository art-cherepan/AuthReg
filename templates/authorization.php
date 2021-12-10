<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<!doctype html>
<html lang="en">
<head>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="/AuthReg/css/bootstrap.min.css">
        <!--собственные стили-->
        <link rel="stylesheet" href="/AuthReg/css/styles.css">
        <!-- Bootstrap JS + Popper JS -->
        <script defer src="/AuthReg/js/bootstrap.bundle.min.js"></script>
        <title>Авторизация</title>
    </head>
</head>
<body>
<div class="container">
    <div class="row pt-3">
        <div class="col-6 offset-3 alert alert-dark">
            <form action="/AuthReg/services/authorization.php" method="post">
                <div class="form-group pb-2">
                    <label class="pb-1" for="inputUserName">Логин</label>
                    <input type="text"
                           name="userName"
                           class="form-control"
                           id="inputUserName"
                           placeholder="Введите логин"
                           value=""/>
                </div>
                <div class="form-group pb-2">
                    <label class="pb-1" for="inputPassword">Пароль</label>
                    <input type="password"
                           name="password"
                           class="form-control"
                           id="inputPassword"
                           placeholder="Введите пароль"
                           value=""/>
                </div>
                <div class="form-group pt-3">
                    <button class="btn btn-dark" type="submit">Войти</button>
                    <a class="btn btn-dark" href="/AuthReg/index.php" role="button">На главную</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>