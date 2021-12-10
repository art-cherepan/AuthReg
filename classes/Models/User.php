<?php

require_once __DIR__ . '/../DB.php';

class User
{
    protected $id;
    protected $userName;
    protected $passwordHash;
    protected $firstName;
    protected $secondName;
    protected $patronymic;
    protected $email;
    protected $DB;

    public function __construct($id, $userName, $passwordHash, $firstName, $secondName, $patronymic, $email)
    {
        $this->id = $id;
        $this->userName = $userName;
        $this->passwordHash = $passwordHash;
        $this->firstName = $firstName;
        $this->secondName = $secondName;
        $this->patronymic = $patronymic;
        $this->email = $email;
        $this->DB = new DB('localhost', 'auth_reg', 'root', 'root');
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @return mixed
     */
    public function getPasswordHash()
    {
        return $this->passwordHash;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @return mixed
     */
    public function getSecondName()
    {
        return $this->secondName;
    }

    /**
     * @return mixed
     */
    public function getPatronymic()
    {
        return $this->patronymic;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @param mixed $secondName
     */
    public function setSecondName($secondName)
    {
        $this->secondName = $secondName;
    }

    /**
     * @param mixed $patronymic
     */
    public function setPatronymic($patronymic)
    {
        $this->patronymic = $patronymic;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param mixed $passwordHash
     */
    public function setPasswordHash($passwordHash)
    {
        $this->passwordHash = $passwordHash;
    }


    public function insert()
    {
        $insert = 'INSERT INTO users (user_name, password_hash, first_name, second_name, patronymic, email) VALUES ' . '(\'' . $this->userName . '\',\'' . $this->passwordHash . '\',\'' . $this->firstName . '\',\'' . $this->secondName . '\',\'' . $this->patronymic . '\',\'' . $this->email . '\')';
        $executeInsert = $this->DB->execute($insert);
        if (false !== $executeInsert) {
            return true;
        }
        return false;
    }

    public function update()
    {
        $update = 'UPDATE users SET user_name = ' . '\'' . $this->userName . '\'' . ', password_hash = ' . '\'' . $this->passwordHash . '\'' . ', first_name = ' . '\'' . $this->firstName . '\'' . ', second_name = ' . '\'' . $this->secondName . '\'' . ', patronymic = ' . '\'' . $this->patronymic . '\'' . ', email = ' . '\'' . $this->email . '\' WHERE id = ' . $this->id;
        return $this->DB->execute($update);
    }

    public function delete()
    {
        $delete = 'DELETE FROM users WHERE id = ' . $this->id;
        return $this->DB->execute($delete);
    }
}