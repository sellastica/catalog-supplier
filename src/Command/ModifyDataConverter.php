<?php
namespace Sellastica\CatalogSupplier\Command;

class ModifyDataConverter extends \Symfony\Component\Console\Command\Command
{
	protected function configure(): void
	{
		$this->setName('dataconverter:modify');
		$this->addArgument('path', \Symfony\Component\Console\Input\InputArgument::REQUIRED, 'Path to PHP file');
		$this->addArgument('supplierCode', \Symfony\Component\Console\Input\InputArgument::REQUIRED, 'Supplier code');
		$this->addArgument('format', \Symfony\Component\Console\Input\InputArgument::REQUIRED, 'Feed format');
		$this->addArgument('namespace', \Symfony\Component\Console\Input\InputArgument::OPTIONAL, 'Namespace');
	}

	/**
	 * @param \Symfony\Component\Console\Input\InputInterface $input
	 * @param \Symfony\Component\Console\Output\OutputInterface $output
	 * @return int
	 */
	protected function execute(
		\Symfony\Component\Console\Input\InputInterface $input,
		\Symfony\Component\Console\Output\OutputInterface $output
	): int
	{
		$path = $input->getArgument('path');
		if (!is_file($path)) {
			$output->writeLn("<error>File $path not found</error>");
			return 1;
		}

		$content = file_get_contents($path);

		//replace namespace
		$namespace = 'Suppliers\Suppliers\\' . $input->getArgument('supplierCode');
		if ($input->getArgument('namespace')) {
			$namespace .= '\\' . $input->getArgument('namespace');
		}

		$content = str_ireplace(
			'Suppliers\Suppliers\pattern\\' . $input->getArgument('format'),
			$namespace,
			$content
		);

		file_put_contents($path, $content);
		return 0;
	}
}
