<?php
namespace SupermarketCheckout\Interfaces;

interface ISupermarketCheckoutService
{
	public function checkout(array $items);
}