<?php
use SupermarketCheckout\Model\Basket;
use SupermarketCheckout\Model\Item;

require_once  './vendor/autoload.php'; 

class BasketTest extends \PHPUnit_Framework_TestCase{

	public function testIsItemInBasket(){

		$basket = new Basket();

		$itemA = new Item("A", 50);
		$itemB = new Item("B", 24);
		
		$basket->addItem($itemA);
		
		$this->assertTrue($basket->isItemInBasket($itemA));
		$this->assertFalse($basket->isItemInBasket($itemB));
	}

	public function testCalculateItemQuantity(){

		$basket = new Basket();

		$itemA = new Item("A", 50);
		$itemB = new Item("B", 10);
		$itemC = new Item("C", 225);
		
		$basket->addItem($itemA);
		$basket->addItem($itemA);
		$basket->addItem($itemA);
		$basket->addItem($itemC);

		$this->assertEquals($basket->calculateItemQuantity($itemA), 3);
		$this->assertEquals($basket->calculateItemQuantity($itemB), 0);
		$this->assertEquals($basket->calculateItemQuantity($itemC), 1);
	}

	public function testGetItems(){

		$basket = new Basket();

		$itemA = new Item("A", 50);
		$itemB = new Item("B", 10);

		$basket->addItem($itemA);
		$basket->addItem($itemB);

		$this->assertEquals(2, sizeOf($basket->getItems()));
	}
}