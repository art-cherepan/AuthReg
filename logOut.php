<?php

if (!isset($_SESSION)) {
    session_start();
}

unset($_SESSION['userName']);
unset($_SESSION['passwordHash']);
header('Location: http://localhost/AuthReg/index.php');