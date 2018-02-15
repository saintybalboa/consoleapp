<?php
namespace SupermarketCheckout\Interfaces;

interface ICheckoutService
{
	public function checkout(array $items);
}