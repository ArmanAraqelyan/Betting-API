<?php

namespace src\Models;

use PDO;

class Balance {

    public function __construct(private readonly PDO $pdo) {}

    //TODO can be added DTOs
    public function updateByUserId(int $userId, float $newBalance): bool
    {
        $stmt = $this->pdo->prepare("UPDATE balances SET balance = ? WHERE user_id = ?");

        return $stmt->execute([$newBalance, $userId]);
    }

    public function getBalanceForUpdate(int $userId): float
    {
        $stmt = $this->pdo->prepare("SELECT balance FROM balances WHERE user_id = ? FOR UPDATE");
        $stmt->execute([$userId]);

        return $stmt->fetchColumn();
    }
}