<?php

use src\Models\Bet;
use src\Services\BalanceService;
use src\Services\PayoutCalculator;
use src\Services\TransactionService;

class BetService {

    public function __construct(
        private readonly Bet $betModel,
        private readonly BalanceService $balanceService,
        private readonly TransactionService $transactionService,
        private readonly PayoutCalculator $payoutCalculator
    ) {
    }

    /**
     * @throws Exception
     */
    public function placeBet(int $userId, float $betAmount) {
        return $this->transactionService->executeTransaction(function() use ($userId, $betAmount) {
            $balance = $this->balanceService->getBalanceForUpdate($userId);
            $betAmount = round($betAmount, 2);
            if ($balance < $betAmount) {
                return ['error' => 'Insufficient balance'];
            }

            $generatedNumber = random_int(0, 13);
            $payout = $this->payoutCalculator->calculatePayout($betAmount, $generatedNumber);

            $newBalance = round($balance - $betAmount + $payout, 2);
            $this->balanceService->updateBalance($userId, $newBalance);
            $this->betModel->create($userId, $betAmount, $generatedNumber, $payout);

            return [
                'bet_amount' => $betAmount,
                'generated_number' => $generatedNumber,
                'payout' => $payout,
                'new_balance' => $newBalance
            ];
        });
    }
}
