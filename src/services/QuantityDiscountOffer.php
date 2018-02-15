<?php
namespace SupermarketCheckout\Services;

use SupermarketCheckout\Interfaces\IOffer;

class QuantityDiscountOffer implements IOffer{

	/**
	 * @var int
	*/
	private $quantity;

	/**
	 * @var float
	*/
	private $discount;

	/** 
	 * @param int $quantity
	 * @param float $discount
	*/	
	public function __construct($quantity, $discount){

		$this->quantity = $quantity;
		$this->discount = $discount;
	}

	/** 
	 * Calculates the total price of the number items performing the specified discount each against the specified quantity
	 * 
	 * @param int $numberOfItems
	 * @param float $itemPrice
	 * 
	 * @return float
	*/		
	public function calculate($numberOfItems, $itemPrice){

		$totalPrice = 0;

		if($numberOfItems < $this->quantity){
			$totalPrice = $numberOfItems * $itemPrice;
		}
		else{
			for($i=1; $i<=$numberOfItems; $i++){
				$totalPrice = $totalPrice + $itemPrice;

				if($i % $this->quantity == 0){
					$totalPrice = $totalPrice - $this->discount;
				}
			}
		}

		return $totalPrice;
	}
}
