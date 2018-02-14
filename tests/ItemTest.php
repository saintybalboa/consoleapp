<?php
use SupermarketCheckout\Model\Item;
use SupermarketCheckout\services\QuantityDiscountOffer;

require_once  './vendor/autoload.php'; 

class ItemTest extends \PHPUnit_Framework_TestCase{

	public function testItemPropertyValuesMatchInjectedPropertyValues(){

		$identifier = "A";
		$price = 50;
		$item = new Item($identifier, $price);
	
		$this->assertEquals($identifier, $item->getIdentifier());
		$this->assertEquals($price, $item->getPrice());
	}

	public function testItemTotalPrice(){

		$item = new Item("A", 50);

		$this->assertEquals($item->getTotalPrice(1), 50);
		$this->assertEquals($item->getTotalPrice(2), 100);
		$this->assertEquals($item->getTotalPrice(3), 150);
		$this->assertEquals($item->getTotalPrice(4), 200);
	}

	public function testItemDiscountedTotalPrice(){

		$quantityDiscountOffer = new QuantityDiscountOffer(2, 15);

		$item = new Item("B", 30, $quantityDiscountOffer);

		$this->assertEquals($item->getTotalPrice(1), 30);
		$this->assertEquals($item->getTotalPrice(2), 45);
		$this->assertEquals($item->getTotalPrice(3), 75);
		$this->assertEquals($item->getTotalPrice(4), 90);
	}
}