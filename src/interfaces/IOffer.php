<?php
namespace SupermarketCheckout\Interfaces;

interface IOffer
{
	public function calculate($numberOfItems, $itemPrice);
}