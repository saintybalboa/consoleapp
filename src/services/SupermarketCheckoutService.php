<?php
namespace SupermarketCheckout\Services;

use SupermarketCheckout\Interfaces\iSupermarketCheckoutService;

class SupermarketCheckoutService implements iSupermarketCheckoutService{

	public function calculate(array $items){

		$totalCost = 0;

		foreach($items as $item){
			$totalCost += $item->getPrice();
		}

		return $totalCost;
	}
}