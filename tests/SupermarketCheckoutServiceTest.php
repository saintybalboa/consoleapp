<?php
use SupermarketCheckout\Model\Stock;
use SupermarketCheckout\Model\Item;
use SupermarketCheckout\services\QuantityDiscountOffer;
use SupermarketCheckout\services\SupermarketCheckoutService;

require_once  './vendor/autoload.php'; 

class SupermarketCheckoutServiceTest extends \PHPUnit_Framework_TestCase{

	public function testCheckoutCalculatesValidPrice(){

		$stock = new Stock();

		$stock->addItem(new Item("A", 50, new QuantityDiscountOffer(3, 20)));
		$stock->addItem(new Item("B", 30, new QuantityDiscountOffer(2, 15)));
		$stock->addItem(new Item("C", 20));
		$stock->addItem(new Item("D", 15));

		$supermarketCheckoutService = new SupermarketCheckoutService($stock);

		$this->assertEquals($supermarketCheckoutService->checkout(array("A")), 50);
		$this->assertEquals($supermarketCheckoutService->checkout(array("B")), 30);
		$this->assertEquals($supermarketCheckoutService->checkout(array("C")), 20);
		$this->assertEquals($supermarketCheckoutService->checkout(array("D")), 15);
		$this->assertEquals($supermarketCheckoutService->checkout(array("A", "B", "C", "D")), 115);
		$this->assertEquals($supermarketCheckoutService->checkout(array("A", "A", "A")), 130);
		$this->assertEquals($supermarketCheckoutService->checkout(array("B", "B")), 45);
		$this->assertEquals($supermarketCheckoutService->checkout(array("A", "A", "A", "B", "B", "D")), 190);		
	}
}