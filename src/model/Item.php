<?php
namespace SupermarketCheckout\Model;

use SupermarketCheckout\Interfaces\IOffer;

class Item{

	private $identifier;
	private $price;
	private $offer;

	function __construct($identifier, $price, IOffer $offer = null){
		
		$this->identifier = $identifier;
		$this->price = $price;
		$this->offer = $offer;
	}

	public function getIdentifier(){
		return $this->identifier;
	}

	public function getPrice(){
		return $this->price;
	}

	public function getTotalPrice($numberOfItems){

		if(! is_null($this->offer)) $totalPrice = $this->offer->calculate($numberOfItems, $this->price);
		else $totalPrice = $numberOfItems * $this->price;

		return $totalPrice;
	}
}