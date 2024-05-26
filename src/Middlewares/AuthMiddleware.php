<?php

namespace src\Middlewares;

use src\Controllers\UserController;

class AuthMiddleware
{
    public static function authenticateUser(UserController $userController): array|bool
    {
        $headers = getallheaders();
        $authorizationHeader = $headers['Authorization'] ?? '';
        preg_match('/Bearer\s+(.*)/', $authorizationHeader, $matches);
        $token = $matches[1] ?? '';

        return $userController->authenticate($token);
    }
}