<?php
namespace SupermarketCheckout\Model;

use SupermarketCheckout\Model\Item;

class Stock{

	/**
     * @var array
    */	
	private $items = array();

	/** 
	 * Appends item to items using the item identifier. 
	 * 
	 * @param Item $item
	 * 
	 * @return float
	*/
	public function addItem(Item $item){

		$key = $item->getIdentifier();
		if(! isset($this->items[$key])) $this->items[$key] = array();
		array_push($this->items[$key], $item);
	}

	/** 
	 * Returns the first instance of item that contains the specified item identifer 
	 * 
	 * @param string $identifier
	 * 
	 * @return Item
	*/
	public function getItemByIdentifier($identifier){
		return $this->items[$identifier][0];
	}

	/** 
	 * Performs a check on the existence of the specified item in the stock items
	 * 
	 * @param Item $item
	 * 
	 * @return boolean
	*/	
	public function isItemInStock(Item $item){
		
		$idenfitier = $item->getIdentifier();
		return $this->isValidStockItemIdentifier($idenfitier) && sizeOf($this->items[$idenfitier]) > 0 ? true : false;
	}
	
	/** 
	 * Performs a check on the existence of the specified item identifier in stock items
	 * 
	 * @param int $numberOfItems
	 * 
	 * @return float
	*/
	public function isValidStockItemIdentifier($identifier){
		return isset($this->items[$identifier]) ? true : false;
	}
}