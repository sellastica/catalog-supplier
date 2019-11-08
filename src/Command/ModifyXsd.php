<?php
namespace Sellastica\CatalogSupplier\Command;

class ModifyXsd extends \Symfony\Component\Console\Command\Command
{
	protected function configure(): void
	{
		$this->setName('xsd:modify');
		$this->addArgument('path', \Symfony\Component\Console\Input\InputArgument::REQUIRED, 'Path to XSD file');
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

		//replace data types
		$content = str_ireplace([
			//numeric
			'xs:byte',
			'xs:decimal',
			'xs:integer',
			'xs:int',
			'xs:long',
			'xs:negativeInteger',
			'xs:nonNegativeInteger',
			'xs:nonPositiveInteger',
			'xs:positiveInteger',
			'xs:short',
			'xs:unsignedLong',
			'xs:unsignedInt',
			'xs:unsignedShort',
			'xs:unsignedByte',
			//date
			'xs:dateTime',
			'xs:date',
			'xs:time',
			'xs:duration',
			'xs:gDay',
			'xs:gMonth',
			'xs:gMonthDay',
			'xs:gYear',
			'xs:gYearMonth',
			//string
			'xs:ID',
			'xs:IDREF',
			'xs:language',
			'xs:Name',
			'xs:NMTOKEN',
			'xs:normalizedString',
			'xs:token',
			//misc
			'xs:boolean',
			'xs:NCName',
			'xs:hexBinary',
			'xs:anyURI',
		], 'xs:string', $content);

		//all tags optional
		$content = preg_replace('~ minOccurs=\"[0-9]+\"~i', '', $content);
		$content = str_ireplace('<xs:element ref=', '<xs:element minOccurs="0" ref=', $content);
		$content = str_ireplace('<xs:element maxOccurs', '<xs:element minOccurs="0" maxOccurs', $content);

		file_put_contents($path, $content);
		return 0;
	}
}
