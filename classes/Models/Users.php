<?php

require_once __DIR__ . '/User.php';
require_once __DIR__ . '/../DB.php';

class Users
{
    protected $DB;
    protected $users = [];

    public function __construct()
    {
        $this->DB = new DB('localhost', 'auth_reg', 'root', 'root');
        $getUsers = 'SELECT * FROM users';
        $queryUsers = $this->DB->query($getUsers, []);
        if (false !== $queryUsers) {
            foreach ($queryUsers as $queryUser) {
                $user = new User($queryUser['id'], $queryUser['user_name'],
                    $queryUser['password_hash'], $queryUser['first_name'],
                    $queryUser['second_name'], $queryUser['patronymic'], $queryUser['email']);
                $this->users[] = $user;
            }
        } else {
            die;
        }
    }

    public function getUser($id)
    {
        $getUser = 'SELECT * FROM users WHERE id=:id;';
        $queryUser = $this->DB->query($getUser, [':id' => $id]);
        if (false !== $queryUser) {
            return new User($queryUser[0]['id'], $queryUser[0]['user_name'], $queryUser[0]['password_hash'], $queryUser[0]['first_name'], $queryUser[0]['second_name'], $queryUser[0]['patronymic'], $queryUser[0]['email']);
        }
        return false;
    }

    /**
     * @return array
     */
    public function getUsers()
    {
        return $this->users;
    }

    public function deleteUser($id)
    {
        $delete = 'DELETE FROM users WHERE id=' . $id;
        if (true == $this->DB->execute($delete)) {
            return true;
        } else {
            return false;
        }
    }

    public function getIdByUserName($userName)
    {
        $getId = 'SELECT id FROM users WHERE user_name=:userName;';
        $queryId = $this->DB->query($getId, [':userName' => $userName]);
        if ($queryId !== false) {
            return $queryId[0]['id'];
        }
        return false;
    }

    public function checkUserName($userName)
    {
        $getUserName = 'SELECT * FROM users WHERE user_name=:userName;';
        $queryUserName = $this->DB->query($getUserName, [':userName' => $userName]);
        if ($queryUserName !== false) {
            if (count($queryUserName) > 0) {
                return true;
            }
        }
        return false;
    }

    public function checkEmail($email)
    {
        $getUserEmail = 'SELECT * FROM users WHERE email=:email;';
        $queryUserEmail = $this->DB->query($getUserEmail, [':email' => $email]);
        if ($queryUserEmail !== false) {
            if (count($queryUserEmail) > 0) {
                return true;
            }
        }
        return false;
    }

    public function checkPassword($userName, $password)
    {
        $getPasswordHash = 'SELECT password_hash FROM users WHERE user_name=:userName';
        $queryPasswordHash = $this->DB->query($getPasswordHash, [':userName' => $userName]);
        if ($queryPasswordHash !== false) {
            if (password_verify($password, $queryPasswordHash[0]['password_hash'])) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}