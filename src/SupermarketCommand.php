<?php
namespace SupermarketCheckout;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Formatter\OutputFormatterStyle;

class SupermarketCheckoutCommand extends Command{

	protected function configure(){
		$this->setName("SupermarketCheckout:SupermarketCheckout")
			 ->setDescription("Calculates the total price of a number of items")
			 ->addArgument('Items', InputArgument::REQUIRED, 'What items do you wish to buy');
	}

	protected function execute(InputInterface $input, OutputInterface $output){
		$output->writeln('Thanks for your purchasing: ' . $input->getArgument('Items'));
	}
}