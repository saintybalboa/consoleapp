<?php
use SupermarketCheckout\Model\Item;
use SupermarketCheckout\services\QuantityDiscountOffer;

require_once  './vendor/autoload.php'; 

class QuantityDiscountOfferTest extends \PHPUnit_Framework_TestCase{

	public function testDiscount20FromPriceOf3(){

		$quantityDiscountOffer = new QuantityDiscountOffer(3, 20);

		$totalPrice = $quantityDiscountOffer->calculate(3, 50);

		$this->assertEquals($totalPrice, 130);
	}
	
	public function testDiscount15FromPriceOf2(){

		$quantityDiscountOffer = new QuantityDiscountOffer(2, 15);

		$totalPrice = $quantityDiscountOffer->calculate(2, 30);

		$this->assertEquals($totalPrice, 45);
	}

	public function testDiscountNFromPriceOfN(){

		$discount = 13.50;
		$quantity = 3;

		$quantityDiscountOffer = new QuantityDiscountOffer($quantity, $discount);

		$totalPrice = $quantityDiscountOffer->calculate(15, 23.65);

		$this->assertEquals($totalPrice, 287.25);
	}
}