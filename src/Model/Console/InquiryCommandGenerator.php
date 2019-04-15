<?php
namespace Sellastica\CatalogSupplier\Model\Console;

class InquiryCommandGenerator extends AbstractCommandGenerator
{
	/** @var \Sellastica\CatalogSupplier\Entity\SupplierInquiry */
	private $inquiry;
	/** @var bool */
	private $reformat = true;


	/**
	 * @param \Sellastica\CatalogSupplier\Entity\SupplierInquiry $inquiry
	 */
	public function __construct(
		\Sellastica\CatalogSupplier\Entity\SupplierInquiry $inquiry
	)
	{
		$this->inquiry = $inquiry;
	}

	/**
	 * @param bool $reformat
	 */
	public function setReformat(bool $reformat): void
	{
		$this->reformat = $reformat;
	}

	/**
	 * @return string
	 */
	public function generate(): string
	{
		$baseDir = 'temp_local/inquiries';
		$unformattedFile = sprintf('%s/%s_unformatted.xml', $baseDir, $this->inquiry->getId());
		$formattedFile = sprintf('%s/%s.xml', $baseDir, $this->inquiry->getId());

		$commands = [
			$this->comment('change directory'),
			$this->cd($this->baseDir),
			$this->htmlBreak(2),
			$this->phpBreak(),
			$this->comment('create subdirectory'),
			$this->mkdir($this->createRelativePath('temp_local/inquiries')),
			$this->htmlBreak(2),
			$this->phpBreak(),
			$this->comment('download export'),
			$this->wget(
				$this->inquiry->getFeedUrl(),
				$this->createRelativePath($unformattedFile),
				$this->inquiry->getLogin(),
				$this->inquiry->getPassword()
			),
		];

		//reformat
		if ($this->reformat) {
			$commands = array_merge($commands, [
				$this->htmlBreak(2),
				$this->phpBreak(),
				$this->comment('reformat xml'),
				$this->xml_pp(
					$this->createRelativePath($unformattedFile),
					$this->createRelativePath($formattedFile)
				),
			]);
		}

		//glogg
		$commands = array_merge($commands, [
			$this->htmlBreak(2),
			$this->phpBreak(),
			$this->comment('open in glogg'),
			$this->glogg($this->reformat
				? $this->createRelativePath($formattedFile)
				: $this->createRelativePath($unformattedFile)
			),
		]);

		return implode(PHP_EOL, $commands);
	}
}