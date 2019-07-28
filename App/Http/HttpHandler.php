<?php

namespace App\Http;

use App\Data\ErrorDTO;
use App\Data\UserDTO;
use App\Service\UserServiceInterface;

class HttpHandler extends HttpHandlerAbstract
{
    public function Register(UserServiceInterface $userService, array $formData)
    {
        if (isset($formData['register'])) {
            $user = UserDTO::Create(
                $formData['username'],
                $formData['password'],
                $formData['first_name'],
                $formData['last_name'],
                $formData['birthday']);

            if ($userService->register($user, $formData['confirm_password'])) {
                $this->Redirect('login.php');
            } else {
                $this->Render("app/error", array(new ErrorDTO("Error has occurred: invalid params.")));
            }
        } else {
            $this->Render("users/register");
        }
    }

    public function Login(UserServiceInterface $userService, array $formData)
    {
        if (isset($formData['login'])) {
            $userDTO = $userService->login($formData['username'], $formData['password']);
            if ($userDTO != null) {
                $_SESSION['id'] = $userDTO->getId();
                $this->Redirect('profile.php');
            } else {
                $this->Render("app/error", array(new ErrorDTO("Error has occurred: Invalid params.")));
            }
        } else {
            $this->Render("users/login");
        }
    }

    public function Edit(UserServiceInterface $userService, array $formData)
    {
        if (isset($formData['edit'])) {
            $user = UserDTO::Create(
                $formData['username'],
                $formData['password'],
                $formData['first_name'],
                $formData['last_name'],
                $formData['birthday']);

            $user->setId($_SESSION['id']);
            if ($userService->edit($user)) {
                $userService->edit($user);
                $this->Redirect('profile.php');
            } else {
                $this->Render("app/error", array(new ErrorDTO("Error has occurred while editing.")));
            }
        } else {
            $userDTOArray = array($userService->getUser($_SESSION['id']));
            $this->Render("users/edit", $userDTOArray);
        }
    }

    public function ListUsers(UserServiceInterface $userService)
    {
        if (isset($_SESSION['id'])) {
            $users = array($userService->getAll());
            $this->Render("users/list", $users);
        }
    }
}