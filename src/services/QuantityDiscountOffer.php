<?php
namespace SupermarketCheckout\Services;

use SupermarketCheckout\Interfaces\IOffer;

class QuantityDiscountOffer implements IOffer{

	private $quantity;
	private $discount;

	public function __construct($quantity, $discount){

		$this->quantity = $quantity;
		$this->discount = $discount;
	}

	public function calculate($numberOfItems, $itemPrice){

		$totalPrice = 0;

		if($numberOfItems < $this->quantity){
			$totalPrice = $numberOfItems * $itemPrice;
		}
		else{
			for($i=0; $i<$numberOfItems; $i++){
				$totalPrice = $totalPrice + $itemPrice;

				if($i % $this->quantity == 0){
					$totalPrice = $totalPrice - $this->discount;
				}
			}
		}

		return $totalPrice;
	}
}
