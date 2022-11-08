<?php

namespace App\Http\Controllers\Api;

use App\DataTransferObjects\Api\LoginForm;
use App\DataTransferObjects\Api\RegistrationForm;
use App\Enums\GlobalEnum;
use App\Exceptions\CustomException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\RegistrationRequest;
use App\Services\Api\AuthService;
use Exception;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{

    public function __construct(private AuthService $authService)
    {
    }


    /**
     * @param  \App\Http\Requests\Api\RegistrationRequest  $request
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function register(RegistrationRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = RegistrationForm::fromRequest($request);
            $userAndToken = $this->authService->registration(userData: $data);
            return response()->json($userAndToken, 422);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            throw new CustomException(GlobalEnum::SomethingWrong);
        }
    }


    /**
     * @param  \App\Http\Requests\Api\LoginRequest  $request
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function login(LoginRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = LoginForm::fromRequest($request);
            $userAndToken = $this->authService->checkUserAndLogin(userData: $data);
            return response()->json($userAndToken, 422);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            throw new CustomException(GlobalEnum::SomethingWrong);
        }
    }
}
