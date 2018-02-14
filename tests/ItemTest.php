<?php
use SupermarketCheckout\Model\Item;

require_once  './vendor/autoload.php'; 

class ItemTest extends \PHPUnit_Framework_TestCase{

	public function testItemPropertyValuesMatchInjectedPropertyValues(){

		$identifier = "A";
		$price = 50;
		$item = new Item($identifier, $price);
	
		$this->assertEquals($identifier, $item->getIdentifier());
		$this->assertEquals($price, $item->getPrice());
	}
}