<?php

namespace src\Controllers;

use src\Services\UserService;

class UserController
{
    public function __construct(private readonly UserService $userService) {}

    public function authenticate(string $token): array|bool
    {
        return $this->userService->authenticate($token);
    }
}