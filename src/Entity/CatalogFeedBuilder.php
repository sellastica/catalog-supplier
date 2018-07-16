<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\IBuilder;
use Sellastica\Entity\TBuilder;

/**
 * @see CatalogFeed
 */
class CatalogFeedBuilder implements IBuilder
{
	use TBuilder;

	/** @var int */
	private $supplierId;
	/** @var string */
	private $title;
	/** @var string */
	private $itemXPath;
	/** @var string|null */
	private $xsl;
	/** @var string|null */
	private $xsd;

	/**
	 * @param int $supplierId
	 * @param string $title
	 * @param string $itemXPath
	 */
	public function __construct(
		int $supplierId,
		string $title,
		string $itemXPath
	)
	{
		$this->supplierId = $supplierId;
		$this->title = $title;
		$this->itemXPath = $itemXPath;
	}

	/**
	 * @return int
	 */
	public function getSupplierId(): int
	{
		return $this->supplierId;
	}

	/**
	 * @return string
	 */
	public function getTitle(): string
	{
		return $this->title;
	}

	/**
	 * @return string
	 */
	public function getItemXPath(): string
	{
		return $this->itemXPath;
	}

	/**
	 * @return string|null
	 */
	public function getXsl()
	{
		return $this->xsl;
	}

	/**
	 * @param string|null $xsl
	 * @return $this
	 */
	public function xsl(string $xsl = null)
	{
		$this->xsl = $xsl;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getXsd()
	{
		return $this->xsd;
	}

	/**
	 * @param string|null $xsd
	 * @return $this
	 */
	public function xsd(string $xsd = null)
	{
		$this->xsd = $xsd;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function generateId(): bool
	{
		return !CatalogFeed::isIdGeneratedByStorage();
	}

	/**
	 * @return CatalogFeed
	 */
	public function build(): CatalogFeed
	{
		return new CatalogFeed($this);
	}

	/**
	 * @param int $supplierId
	 * @param string $title
	 * @param string $itemXPath
	 * @return self
	 */
	public static function create(
		int $supplierId,
		string $title,
		string $itemXPath
	): self
	{
		return new self($supplierId, $title, $itemXPath);
	}
}