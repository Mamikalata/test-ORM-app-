<?php

namespace App\Repositories;


use App\Data\UserDTO;

interface UserRepositoryInterface
{
    public function Register(userDTO $userDTO) : bool;

    public function FindOneByUsername(string $username) : ?UserDTO;

    public function FindOneById(int $id) : ?UserDTO;

    public function Edit(userDTO $userDTO) : bool;
    
    /**
    * @return \Generator|UserDTO[]
    */
    public function GetAll() : \Generator;
}