<?php

namespace App\Services\Api;

use App\DataTransferObjects\Api\RegistrationForm;
use App\Enums\GlobalEnum;
use App\Models\User;

class UserService
{
    /**
     * @param  \App\DataTransferObjects\Api\RegistrationForm  $userData
     *
     * @return object
     */
    public function addUser(RegistrationForm $userData): object
    {
        $user = new User();
        $user->name = $userData->name;
        $user->email = $userData->email;
        $user->password = $userData->password;
        $user->amount = GlobalEnum::UserAmount;
        $user->save();
        return $user;
    }


    /**
     * @param  float  $amount
     *
     * @return void
     */
    public function updateAmount(float $amount): void
    {
        $user = auth()->user();
        $userAmount = $user->amount - $amount;
        $user->amount = $userAmount;
        $user->save();
    }
}
