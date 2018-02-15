<?php
namespace SupermarketCheckout;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Formatter\OutputFormatterStyle;
use SupermarketCheckout\Model\Stock;
use SupermarketCheckout\Model\Item;
use SupermarketCheckout\services\QuantityDiscountOffer;
use SupermarketCheckout\services\SupermarketCheckoutService;

class SupermarketCheckoutCommand extends Command{

	protected function configure(){
		$this->setName("SupermarketCheckout:SupermarketCheckout")
			 ->setDescription("Calculates cost of selected items for purchase")
			 ->addArgument('Items', InputArgument::REQUIRED, 'Please select from the following items: A, B, C, D');
	}

	protected function execute(InputInterface $input, OutputInterface $output){

		$stock = new Stock();

		$stock->addItem(new Item("A", 50, new QuantityDiscountOffer(3, 20)));
		$stock->addItem(new Item("B", 30, new QuantityDiscountOffer(2, 15)));
		$stock->addItem(new Item("C", 20));
		$stock->addItem(new Item("D", 15));

		$supermarketCheckoutService = new SupermarketCheckoutService($stock);

		$checkoutItems = str_split($input->getArgument('Items'));

		$totalCost = $supermarketCheckoutService->checkout($checkoutItems);

		$output->writeln(sprintf('Total cost: %d', $totalCost));
		$output->writeln('Thanks for your purchase!');
	}
}