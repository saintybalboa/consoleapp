<?php
use SupermarketCheckout\Model\Stock;
use SupermarketCheckout\Model\Item;

require_once  './vendor/autoload.php'; 

class StockTest extends \PHPUnit_Framework_TestCase{

	public function testIsItemInStock(){

		$stock = new Stock();

		$itemA = new Item("A", 50);
		$itemB = new Item("B", 24);
		
		$stock->addItem($itemA);
		
		$this->assertTrue($stock->isItemInStock($itemA));
		$this->assertFalse($stock->isItemInStock($itemB));
	}
	
	public function testIsValidStockItemIdentifier(){

		$stock = new Stock();

		$itemA = new Item("A", 50);

		$stock->addItem($itemA);
		
		$this->assertTrue($stock->isValidStockItemIdentifier("A"));
		$this->assertFalse($stock->isValidStockItemIdentifier("B"));
	}

	public function testGetItemByIdentifier(){

		$stock = new Stock();

		$itemA = new Item("A", 50);

		$stock->addItem($itemA);
		
		$this->assertEquals($stock->getItemByIdentifier("A"), $itemA);
	}
}