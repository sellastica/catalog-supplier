<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\IBuilder;
use Sellastica\Entity\TBuilder;

/**
 * @see CatalogSupplier
 */
class CatalogSupplierBuilder implements IBuilder
{
	use TBuilder;

	/** @var string */
	private $title;
	/** @var string */
	private $code;
	/** @var string|null */
	private $xsd;

	/**
	 * @param string $title
	 * @param string $code
	 */
	public function __construct(
		string $title,
		string $code
	)
	{
		$this->title = $title;
		$this->code = $code;
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
	public function getCode(): string
	{
		return $this->code;
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
		return !CatalogSupplier::isIdGeneratedByStorage();
	}

	/**
	 * @return CatalogSupplier
	 */
	public function build(): CatalogSupplier
	{
		return new CatalogSupplier($this);
	}

	/**
	 * @param string $title
	 * @param string $code
	 * @return self
	 */
	public static function create(
		string $title,
		string $code
	): self
	{
		return new self($title, $code);
	}
}