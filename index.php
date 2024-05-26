<?php

use src\Controllers\{BetController, UserController};
use src\Database\Database;
use src\Models\{Balance, Bet, User};
use src\Services\{BalanceService, PayoutCalculator, TransactionService, UserService};

require 'src/config/db.php';
require 'src/Database/Database.php';

require 'src/Models/User.php';
require 'src/Models/Balance.php';
require 'src/Models/Bet.php';

require 'src/Services/UserService.php';
require 'src/Services/BalanceService.php';
require 'src/Services/BetService.php';
require 'src/Services/TransactionService.php';
require 'src/Services/PayoutCalculator.php';

require 'src/Middlewares/AuthMiddleware.php';

require 'src/Controllers/UserController.php';
require 'src/Controllers/BetController.php';

$db = Database::getInstance();

$userModel = new User($db->getConnection());
$balanceModel = new Balance($db->getConnection());
$betModel = new Bet($db->getConnection());

$userService = new UserService($userModel);
$balanceService = new BalanceService($balanceModel);
$transactionService = new TransactionService($db->getConnection());
$payoutCalculator = new PayoutCalculator();
$betService = new BetService($betModel, $balanceService, $transactionService, $payoutCalculator);

$userController = new UserController($userService);
$betController = new BetController($betService);

require 'src/routes/api.php';
