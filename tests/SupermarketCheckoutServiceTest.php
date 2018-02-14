<?php
use SupermarketCheckout\Model\Item;
use SupermarketCheckout\services\QuantityDiscountOffer;

require_once  './vendor/autoload.php'; 

class SupermarketCheckoutServiceTest extends \PHPUnit_Framework_TestCase{

	public function testCheckout(){

		$itemA = new Item("A", 50, new QuantityDiscountOffer(3, 20));
		$itemB = new Item("B", 30, new QuantityDiscountOffer(2, 15));
		$itemC = new Item("C", 20);
		$itemD = new Item("D", 15);
	}
}