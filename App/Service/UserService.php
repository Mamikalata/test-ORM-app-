<?php

namespace App\Service;

use App\Data\UserDTO;
use App\Repositories\UserRepositoryInterface;

class UserService implements UserServiceInterface
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * UserService constructor.
     * @param $userRepository
     */
    public function __construct($userRepository)
    {
        $this->userRepository = $userRepository;
    }


    public function register(UserDTO $userDTO, string $confirm_password) : bool
    {
        if ($userDTO->getPassword() != $confirm_password) {
            return false;
        }

        if ($this->userRepository->FindOneByUsername($userDTO->getUsername()) != null) {
            return false;
        }

        $plainText = $userDTO->getPassword();
        $password_hash = password_hash($plainText, PASSWORD_DEFAULT);
        $userDTO->setPassword($password_hash);

        return $this->userRepository->Register($userDTO);
    }


    public function login(string $username, string $password) : ?UserDTO
    {
        $userDTO = $this->userRepository->FindOneByUsername($username);
        if ($userDTO == null) {
            return null;
        } else {
            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            if (password_verify($password, $password_hash) == false) {
                return null;
            }
            return $userDTO;
        }
    }

    public function edit(UserDTO $userDTO) : bool
    {
        if ($this->userRepository->FindOneById($userDTO->getId()) == null) {
            return false;
        } else {
            $plainText = $userDTO->getPassword();
            $password_hash = password_hash($plainText, PASSWORD_DEFAULT);
            $userDTO->setPassword($password_hash);

            return $this->userRepository->Edit($userDTO);
        }
    }

    public function getUser(int $id) : ?UserDTO
    {
        return $this->userRepository->FindOneById($id);
    }

    /**
    * @return \Generator|UserDTO[]
    */
    public function getAll() : \Generator
    {
        return $this->userRepository->GetAll();
    }
}






















