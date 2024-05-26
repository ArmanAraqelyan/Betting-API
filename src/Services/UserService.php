<?php

namespace src\Services;

use src\Models\User;

class UserService {

    public function __construct(private readonly User $userModel) {}

    public function authenticate(string $token): array|bool
    {
        return $this->userModel->findByToken($token);
    }
}