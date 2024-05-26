<?php

namespace src\Services;

use Exception;
use PDO;

class TransactionService {

    public function __construct(private readonly PDO $pdo) {}

    /**
     * @throws Exception
     */
    public function executeTransaction(callable $callback) {
        try {
            $this->pdo->beginTransaction();
            $result = $callback();
            $this->pdo->commit();
            return $result;
        } catch (Exception $e) {
            $this->pdo->rollBack();
            throw $e;
        }
    }
}
