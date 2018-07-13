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
	/** @var string|null */
	private $xsd;

	/**
	 * @param int $supplierId
	 * @param string $title
	 */
	public function __construct(
		int $supplierId,
		string $title
	)
	{
		$this->supplierId = $supplierId;
		$this->title = $title;
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
	 * @return self
	 */
	public static function create(
		int $supplierId,
		string $title
	): self
	{
		return new self($supplierId, $title);
	}
}