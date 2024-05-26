<?php

namespace src\Services;

class PayoutCalculator
{
    public function calculatePayout(float $betAmount, int $generatedNumber): float|int
    {
        // Payout logic targeting an RTP of 95%
        if ($generatedNumber == 7) {
            return $betAmount * 12;
        } elseif ($generatedNumber % 2 == 0) {
            return $betAmount * 1.5;
        }
        // no payout for odd numbers
        return 0;
    }
}