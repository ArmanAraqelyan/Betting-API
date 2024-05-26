<?php

use src\Controllers\BetController;
use src\Controllers\UserController;
use src\Middlewares\AuthMiddleware;

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    /** @var UserController $userController */
    $user = AuthMiddleware::authenticateUser($userController);

    if (!$user) {
        echo json_encode(['error' => 'Invalid token']);
        exit;
    }

    //TODO the route can be changed
    if ($_GET['action'] === 'place_bet') {
        $betAmount = $_POST['bet_amount'];

        /** @var BetController $betController */
        $result = $betController->placeBet($user['id'], $betAmount);
        echo json_encode($result);
    }
}