<?php

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use SupermarketCheckout\SupermarketCheckoutCommand;

require_once  './vendor/autoload.php'; 

class SupermarketCheckoutCommandTest extends \PHPUnit_Framework_TestCase{

	public function testShoppingBasketCorrect(){

		$application = new Application();
		$application->add(new SupermarketCheckoutCommand());

		$command = $application->find('SupermarketCheckout:SupermarketCheckout');

		$commandTester = new CommandTester($command);

		$commandTester->execute(array(
			'command' => $command->getName(),
			'Items' => 'ABBCA'
		));

		$this->assertRegexp('/Total cost/', $commandTester->getDisplay());
	}
}