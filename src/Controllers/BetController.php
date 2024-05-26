<?php

namespace src\Controllers;

use BetService;
use Exception;

class BetController
{
    public function __construct(private readonly BetService $betService) {}

    /**
     * @throws Exception
     */
    public function placeBet(int $userId, float $betAmount): array
    {
        return $this->betService->placeBet($userId, $betAmount);
    }
}