<?php

namespace App\Data;

class UserDTO
{
    private $id;
    private $username;
    private $password;
    private $firstName;
    private $lastName;
    private $birthday;

    public static function Create(string $username, string $password,
                                  string $firstName, string $lastName, $birthday, int $id = null
    ) : UserDTO
    {
        return (new UserDTO())
            ->setUsername($username)
            ->setPassword($password)
            ->setFirstName($firstName)
            ->setLastName($lastName)
            ->setBirthday($birthday)
            ->setId($id);
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function setId($id) : UserDTO
    {
        $this->id = $id;
        return $this;
    }
    
    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username) : UserDTO
    {
        $this->username = $username;
        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password) : UserDTO
    {
        $this->password = $password;
        return $this;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    function setFirstName($firstName) : UserDTO
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName) : UserDTO
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function getBirthday()
    {
        return $this->birthday;
    }

    public function setBirthday($birthday) : UserDTO
    {
        $this->birthday = $birthday;
        return $this;
    }
}