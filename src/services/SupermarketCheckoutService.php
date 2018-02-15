<?php
namespace SupermarketCheckout\Services;

use SupermarketCheckout\Interfaces\ICheckoutService;
use SupermarketCheckout\Model\Basket;
use SupermarketCheckout\Model\Stock;
use SupermarketCheckout\Model\Item;

class SupermarketCheckoutService implements ICheckoutService{

	/**
	 * @var array
	*/	
	private $stock;

	/** 
	 * @param Stock $stock
	*/	
	public function __construct(Stock $stock){

		$this->stock = $stock;
	}

	/** 
	 * Calculates the total price of the items using the specified item identifiers
	 * 
	 * @param array $itemIdentifiers  item identifiers used to find items in stock
	 * 
	 * @return float
	*/			
	public function checkout(array $itemIdentifiers){

		$totalPrice = 0;
		$uniqueItemIdentifiers = array_unique($itemIdentifiers);
		$basket = new Basket();

		foreach($itemIdentifiers as $itemIdentifier){	
			if($this->stock->isValidStockItemIdentifier($itemIdentifier)) $basket->addItem($this->stock->getItemByIdentifier($itemIdentifier));
		}

		foreach($uniqueItemIdentifiers as $itemIdentifier){
			if($this->stock->isValidStockItemIdentifier($itemIdentifier)){

				$item = $this->stock->getItemByIdentifier($itemIdentifier);
				$quantity = $basket->calculateItemQuantity($item);
				$totalPrice += $item->getTotalPrice($quantity);
			}
		}

		return $totalPrice;
	}
}