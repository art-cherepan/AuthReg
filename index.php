<?php
if (!isset($_SESSION)) {
    session_start();
}

//foreach ($_SESSION as $key => $value) {
//    unset($_SESSION[$key]);
//}

require_once __DIR__ . '/classes/View.php';
require_once __DIR__ . '/classes/Models/User.php';
require_once __DIR__ . '/classes/Models/Users.php';
require_once __DIR__ . '/classes/DB.php';

$view = new View();

if (!empty($_SESSION['userName']) && !empty($_SESSION['passwordHash'])) {
    $users = new Users();
    $userId = $users->getIdByUserName($_SESSION['userName']);
    $user = $users->getUser($userId);
    $view->assign('user', $user);
    $view->display(__DIR__ . '/templates/account.php');
} else {
    $view->display(__DIR__ . '/templates/main.php');
}