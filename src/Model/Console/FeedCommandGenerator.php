<?php
namespace Sellastica\CatalogSupplier\Model\Console;

class FeedCommandGenerator extends AbstractCommandGenerator
{
	/** @var \Sellastica\CatalogSupplier\Entity\CatalogFeed */
	private $feed;
	/** @var bool */
	private $reformat = true;
	/** @var bool */
	private $revalidate = false;
	/** @var bool */
	private $edit = true;
	/** @var string|null */
	private $url;
	/** @var string|null */
	private $login;
	/** @var string|null */
	private $password;


	/**
	 * @param \Sellastica\CatalogSupplier\Entity\CatalogFeed $feed
	 */
	public function __construct(
		\Sellastica\CatalogSupplier\Entity\CatalogFeed $feed
	)
	{
		$this->feed = $feed;
		$this->url = $this->feed->getUrl();
		$this->login = $this->feed->getLogin();
		$this->password = $this->feed->getPassword();
	}

	/**
	 * @return string
	 */
	public function generate(): string
	{
		if (!$this->feed->getCompression()->isNone()) {
			$this->reformat = false;
		}

		$suppliersDir = 'app/model/Suppliers/Suppliers';
		$supplierDir = sprintf('%s/%s', $suppliersDir, $this->feed->getSupplier()->getCode());
		$filename = $this->feed->getSchemaFilename()
			? pathinfo($this->feed->getSchemaFilename(), PATHINFO_FILENAME)
			: 'products';
		$formattedFile = $this->feed->getCompression()->isNone()
			? sprintf('%s/%s.%s', $supplierDir, $filename, $this->feed->getFeedFormat()->getValue())
			: sprintf('%s/%s.%s', $supplierDir, $filename, $this->feed->getCompression()->getValue());
		$unformattedFile = sprintf('%s/%s_unformatted.%s', $supplierDir, $filename, $this->feed->getFeedFormat()->getValue());
		$schemaBasename = $filename . '.' . pathinfo($this->feed->getSchemaFilename(), PATHINFO_EXTENSION);
		$scriptBasename = 'DataConverter.php';

		$commands = [
			$this->comment('change directory'),
			$this->cd($this->baseDir),
			$this->htmlBreak(2),
			$this->phpBreak(),
			$this->comment('download export'),
			$this->mkdir($this->createRelativePath($supplierDir)),
			$this->htmlBreak(),
			$this->phpBreak(),
			$this->wget(
				$this->url,
				$this->createRelativePath($this->reformat ? $unformattedFile : $formattedFile),
				$this->login,
				$this->password
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
				$this->htmlBreak(),
				$this->phpBreak(),
				$this->removeFile($unformattedFile),
			]);
		}

		//generate xsd
		if ($this->edit) {
			$commands = array_merge($commands, [
				$this->htmlBreak(2),
				$this->phpBreak(),
				$this->comment('generate xsd'),
				$this->trang(
					$this->createRelativePath("$formattedFile"),
					$this->createRelativePath("$supplierDir/$schemaBasename")
				),
				$this->htmlBreak(),
				$this->phpBreak(),
				$this->cp(
					$this->createRelativePath("$supplierDir/$schemaBasename"),
					$this->createRelativePath("{$supplierDir}/{$schemaBasename}b")
				),
				$this->htmlBreak(),
				$this->phpBreak(),
				$this->php('xsd:modify ' . $this->createRelativePath("$supplierDir/$schemaBasename"))
			]);
		}

		if ($this->revalidate) {
			//remove XML
			$commands = array_merge($commands, [
				$this->htmlBreak(2),
				$this->phpBreak(),
				$this->comment('remove xml file'),
				$this->removeFile($formattedFile),
			]);
		} else {
			//copy DataConverter.php
			if ($this->edit) {
				$commands = array_merge($commands, [
					$this->htmlBreak(2),
					$this->phpBreak(),
					$this->comment("copy $scriptBasename"),
					$this->cp(
						$this->createRelativePath("$suppliersDir/pattern/$scriptBasename"),
						$this->createRelativePath("$supplierDir/$scriptBasename")
					),
					$this->htmlBreak(),
					$this->phpBreak(),
					$this->php(
						'dataconverter:modify '
						. $this->createRelativePath("$supplierDir/$scriptBasename")
						. ' '
						. $this->feed->getSupplier()->getCode()
					)
				]);

				//open data converter in phpstorm
				$commands = array_merge($commands, [
					$this->htmlBreak(2),
					$this->phpBreak(),
					$this->comment("open data converter in phpstorm"),
					$this->phpstorm($this->createRelativePath("$supplierDir/$scriptBasename")),
				]);
			}

			//glogg
			if ($this->feed->getCompression()->isNone()) {
				$commands = array_merge($commands, [
					$this->htmlBreak(2),
					$this->phpBreak(),
					$this->comment('open in glogg'),
					$this->glogg($this->createRelativePath($formattedFile)),
				]);
			}
		}

		return implode(PHP_EOL, $commands);
	}

	/**
	 * @param bool $reformat
	 */
	public function setReformat(bool $reformat): void
	{
		$this->reformat = $reformat;
	}

	/**
	 * @param bool $revalidate
	 */
	public function setRevalidate(bool $revalidate): void
	{
		$this->revalidate = $revalidate;
	}

	/**
	 * @param bool $edit
	 */
	public function setEdit(bool $edit): void
	{
		$this->edit = $edit;
	}

	/**
	 * @param string|null $url
	 */
	public function setUrl(?string $url): void
	{
		$this->url = $url;
	}

	/**
	 * @param string|null $login
	 */
	public function setLogin(?string $login): void
	{
		$this->login = $login;
	}

	/**
	 * @param string|null $password
	 */
	public function setPassword(?string $password): void
	{
		$this->password = $password;
	}
}