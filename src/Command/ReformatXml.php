<?php
namespace Sellastica\CatalogSupplier\Command;

class ReformatXml extends \Symfony\Component\Console\Command\Command
{
	protected function configure()
	{
		$this->setName('xml:reformat');
		$this->addArgument('path', \Symfony\Component\Console\Input\InputArgument::REQUIRED, 'Path to file');
	}

	/**
	 * @param \Symfony\Component\Console\Input\InputInterface $input
	 * @param \Symfony\Component\Console\Output\OutputInterface $output
	 * @return int
	 */
	protected function execute(
		\Symfony\Component\Console\Input\InputInterface $input,
		\Symfony\Component\Console\Output\OutputInterface $output
	)
	{
		try {
			$dom = new \DomDocument();
			$dom->preserveWhiteSpace = false;
			$dom->formatOutput = true;

			if (!file_exists($input->getArgument('path'))) {
				throw new \Exception(sprintf('File %s does not exits', $input->getArgument('path')));
			}

			$dom->loadXML(file_get_contents($input->getArgument('path')));
			$xmlString = preg_replace('/^  |\G  /m', "\t", $dom->saveXML());
			file_put_contents($input->getArgument('path'), $xmlString);

			return 0;
		} catch (\Throwable $e) {
			$output->writeLn('<error>' . get_class($e) . ': ' . $e->getMessage() . '</error>');
			return 1;
		}
	}
}
