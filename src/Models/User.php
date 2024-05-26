<?php

namespace src\Models;

use PDO;

class User {

    public function __construct(private readonly PDO $pdo) {}

    public function findByToken(string $token): array|bool
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE token = ?");
        $stmt->execute([$token]);

        return $stmt->fetch();
    }
}