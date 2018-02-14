<?php
use SupermarketCheckout\Model\Item;
use SupermarketCheckout\services\QuantityDiscountOffer;

require_once  './vendor/autoload.php'; 

class QuantityDiscountOfferTest extends \PHPUnit_Framework_TestCase{

	public function testDiscount20FromPriceOf3(){

		$quantityDiscountOffer = new QuantityDiscountOffer(3, 20);

		$item = new Item("A", 50, $quantityDiscountOffer);

		$totalPrice = $item->getTotalPrice(3);

		$this->assertEquals($totalPrice, 130);
	}
	
	public function testDiscount15FromPriceOf2(){

		$quantityDiscountOffer = new QuantityDiscountOffer(2, 15);

		$item = new Item("B", 30, $quantityDiscountOffer);

		$totalPrice = $item->getTotalPrice(2);

		$this->assertEquals($totalPrice, 45);
	}
}