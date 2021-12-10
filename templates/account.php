<?php
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
        <title>Личный кабинет</title>
    </head>
</head>

<body>
<div class="container">
    <div class="row mt-3">
        <div class="d-flex justify-content-center">
            <div class="form-group pt-3">
                <h1>Данные пользователя</h1>
            </div>
        </div>
    </div>
    <div class="row pt-3">
        <div class="col-6 offset-3 alert alert-dark">
            <form action="/AuthReg/services/changeUserInfo.php" method="post">
                <div class="form-group pb-2">
                    <label class="pb-1" for="inputUserName">Имя</label>
                    <input type="text"
                           name="firstName"
                           class="form-control"
                           id="inputUserName"
                           placeholder="Введите имя"
                           value="<?php echo $this->data['user']->getFirstName(); ?>"/>
                </div>
                <div class="form-group pb-2">
                    <label class="pb-1" for="inputUserSecondName">Фамилия</label>
                    <input type="text" name="secondName"
                           class="form-control"
                           id="inputUserSecondName"
                           placeholder="Введите фамилию"
                           value="<?php echo $this->data['user']->getSecondName(); ?>"/>
                </div>
                <div class="form-group pb-2">
                    <label class="pb-1" for="inputUserSecondName">Отчество</label>
                    <input type="text" name="patronymic"
                           class="form-control"
                           id="inputUserPatronymic"
                           placeholder="Введите отчество"
                           value="<?php echo $this->data['user']->getPatronymic(); ?>"/>
                </div>
                <div class="form-group pb-2">
                    <label class="pb-1" for="inputEmail">Адрес электронной почты</label>
                    <input type="email"
                           name="email"
                           class="form-control"
                           id="inputEmail"
                           placeholder="Введите адрес электронной почты"
                           value="<?php echo $this->data['user']->getEmail(); ?>"/>
                </div>
                <div class="form-group pb-2">
                    <label class="pb-1" for="inputUserName">Логин</label>
                    <input type="text"
                           name="userName"
                           class="form-control"
                           id="inputUserName"
                           placeholder="Введите логин"
                           value="<?php echo $this->data['user']->getUserName(); ?>"/>
                </div>
                <div class="form-group pb-2">
                    <label class="pb-1" for="inputPasswordOld">Старый пароль</label>
                    <input type="password"
                           name="passwordOld"
                           class="form-control"
                           id="inputPasswordOld"
                           placeholder="Введите старый пароль"
                           value=""/>
                </div>
                <div class="form-group pb-2">
                    <label class="pb-1" for="inputPasswordNew">Новый пароль</label>
                    <input type="password"
                           name="passwordNew"
                           class="form-control"
                           id="inputPasswordNew"
                           placeholder="Введите новый пароль"
                           value=""/>
                </div>
                <div class="form-group pt-3">
                    <button class="btn btn-dark" type="submit">Изменить данные</button>
                    <a class="btn btn-dark" href="/AuthReg/logOut.php" role="button">Выйти</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>