<?php 

require_once __DIR__ . '/vendor/autoload.php'; 

use Symfony\Component\Console\Application; 
use SupermarketCheckout\SupermarketCheckoutCommand;

$app = new Application();

$app->add(new SupermarketCheckoutCommand());

$app->run();