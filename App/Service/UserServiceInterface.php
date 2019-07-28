<?php

namespace App\Service;

use App\Data\UserDTO;

interface UserServiceInterface
{
    public function register(UserDTO $userDTO, string $confirm_password) : bool;
    
    public function login(string $username, string $password) : ?UserDTO;
    
    public function edit(UserDTO $userDTO) : bool;
    
    public function getUser(int $id) : ?UserDTO;

    /**
     * @return \Generator|UserDTO[]
     */
    public function getAll() : \Generator;
}