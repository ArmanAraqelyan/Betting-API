<?php

namespace src\Models;

use PDO;

class Bet {

    public function __construct(private readonly PDO $pdo) {}

    //TODO can be added DTOs and Value Objects
    public function create(int $userId, float $betAmount, int $generatedNumber, float $payout): bool
    {
        $stmt = $this->pdo->prepare("INSERT INTO bets (user_id, bet_amount, generated_number, payout) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$userId, $betAmount, $generatedNumber, $payout]);
    }
}