<?php

namespace src\Services;

use src\Models\Balance;

class BalanceService {

    public function __construct(private readonly Balance $balanceModel) {}

    public function getBalanceForUpdate(int $userId): float
    {
        return $this->balanceModel->getBalanceForUpdate($userId);
    }

    //TODO can be added DTOs
    public function updateBalance(int $userId, float $newBalance): bool
    {
        return $this->balanceModel->updateByUserId($userId, $newBalance);
    }
}