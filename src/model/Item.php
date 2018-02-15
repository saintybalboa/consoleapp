<?php
namespace SupermarketCheckout\Model;

use SupermarketCheckout\Interfaces\IOffer;

class Item{

	/**
	 * @var string
	*/	
	private $identifier;

	/**
	 * @var float
	*/	
	private $price;

	/**
	 * @var IOffer
	*/	
	private $offer;

	/**
	 * @param string $identifier
	 * @param float $price
	 * @param IOffer $offer  offer associated with specific item
	 * 
	 * @return boolean
	*/
	public function __construct($identifier, $price, IOffer $offer = null){
		
		$this->identifier = $identifier;
		$this->price = $price;
		$this->offer = $offer;
	}

	/** 
	* @return string
	*/	
	public function getIdentifier(){
		return $this->identifier;
	}

	/** 
	* @return float
	*/	
	public function getPrice(){
		return $this->price;
	}

	/** 
	 * Calculates the total price for the specified number of items. 
	 * 
	 * @param int $numberOfItems
	 * 
	 * @return float
	*/	
	public function getTotalPrice($numberOfItems){

		if(! is_null($this->offer)) $totalPrice = $this->offer->calculate($numberOfItems, $this->price);
		else $totalPrice = $numberOfItems * $this->price;

		return $totalPrice;
	}
}