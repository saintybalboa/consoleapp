<?php

use SupermarketCheckout\SupermarketCheckoutCommand;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

require_once  './vendor/autoload.php'; 

class SupermarketCheckoutCommandTest extends \PHPUnit_Framework_TestCase{

    public function testShoppingBasketCorrect(){

        $application = new Application();
        $application->add(new SupermarketCheckoutCommand());

        $command = $application->find('SupermarketCheckout:SupermarketCheckout');

        $commandTester = new CommandTester($command);

        $items = 'ABBCA';

        $commandTester->execute(array(
            'command' => $command->getName(),
            'Items' => $items
        ));    

        $expectedOutput = sprintf('Thanks for your purchasing: %s', $items);
        $actualOutput = $commandTester->getDisplay();   

        $this->assertEquals($expectedOutput, $actualOutput);
    }
}