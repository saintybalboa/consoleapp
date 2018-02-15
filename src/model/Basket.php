<?php
namespace SupermarketCheckout\Model;

use SupermarketCheckout\Model\Item;

class Basket{

	/**
     * @var array
    */	
	private $items = array();

	/**
     * @param Item $item
    */
	public function addItem(Item $item){

		$key = $item->getIdentifier();
		if(! isset($this->items[$key])) $this->items[$key] = array();
		array_push($this->items[$key], $item);
	}

	/**
     * @return array
    */	
	public function getItems(){

		return $this->items;
	}

	/**
     * @param Item $item
	 * 
	 * @return boolean
    */
	public function isItemInBasket(Item $item){
		
		$key = $item->getIdentifier();
		return isset($this->items[$key]) && sizeOf($this->items[$key]) > 0 ? true : false;
	}

	/**
     * @param Item $item
	 * 
	 * @return int
    */
	public function calculateItemQuantity(Item $item){
		return $this->isItemInBasket($item) ? sizeOf($this->items[$item->getIdentifier()]) : 0;
	}
}