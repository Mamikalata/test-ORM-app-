<?php

namespace App\Repositories;

use App\Data\UserDTO;
use Database\DatabaseInterface;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @var DatabaseInterface
     */
    private $db;

    /**
     * UserRepository constructor.
     * @param DatabaseInterface $db
     */
    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }

    public function Register(userDTO $userDTO) : bool
    {
        $this->db->query("INSERT INTO users(username, password, first_name, last_name, birthday)
VALUES (?, ?, ?, ?, ?)
 ")->execute([
            $userDTO->getUsername(),
            $userDTO->getPassword(),
            $userDTO->getFirstName(),
            $userDTO->getLastName(),
            $userDTO->getBirthday(),
        ]);

        return true;
    }

    public function FindOneByUsername(string $username) : ?UserDTO
    {
        return $this->db->query("SELECT id, username, password, first_name AS firstName, last_name AS lastName, birthday
FROM users WHERE username = ?")
            ->execute([$username])
            ->fetch(UserDTO::class)
            ->current();
    }

    public function FindOneById(int $id) : ?UserDTO
    {
        return $this->db->query("SELECT id, username, password, first_name AS firstName, last_name AS lastName, birthday
 FROM users WHERE id = ?")
            ->execute([$id])
            ->fetch(UserDTO::class)
            ->current();
    }

    public function Edit(userDTO $userDTO) : bool
    {
        $this->db->query("UPDATE users 
        SET username = ?, password = ?, first_name = ?, last_name = ?, birthday = ?
        WHERE id = ?")->execute([
            $userDTO->getUsername(),
            $userDTO->getPassword(),
            $userDTO->getFirstName(),
            $userDTO->getLastName(),
            $userDTO->getBirthday(),
            $userDTO->getId(),
        ]);
        return true;
    }

    /**
    * @return \Generator|UserDTO[]
    */
    public function getAll() : \Generator
    {
        return $this->db->query("SELECT id, username, password, first_name AS firstName, last_name AS lastName, birthday 
FROM users")
            ->execute([])
            ->fetch(UserDTO::class);
    }
}
























