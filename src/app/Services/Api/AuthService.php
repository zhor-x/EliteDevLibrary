<?php

namespace App\Services\Api;

use App\DataTransferObjects\Api\LoginForm;
use App\DataTransferObjects\Api\RegistrationForm;
use App\Enums\AuthEnum;
use App\Enums\GlobalEnum;


class AuthService
{

    /**
     * @param  \App\Services\Api\UserService  $userService
     */
    public function __construct(private UserService $userService)
    {
    }

    /**
     * @param  RegistrationForm  $userData
     *
     * @return array
     */
    public function registration(RegistrationForm $userData): array
    {
        $user = $this->userService->addUser(userData: $userData);
        return $this->login($user);
    }

    /**
     * @param  \App\DataTransferObjects\Api\LoginForm  $userData
     *
     * @return array
     */
    public function checkUserAndLogin(LoginForm $userData): array
    {
        if (!auth()->attempt(['email' => $userData->email, 'password' => $userData->password])) {
            return [
                GlobalEnum::ErrorMessage => AuthEnum::IncorrectDetails
            ];
        }
        return $this->login();
    }

    /**
     * @param  object|null  $user
     *
     * @return array
     */
    private function login(object|null $user = null): array
    {
        $user = $user ?? auth()->user();
        $token = $user->createToken(AuthEnum::APIToken)->accessToken;
        return compact('user', 'token');
    }

}
