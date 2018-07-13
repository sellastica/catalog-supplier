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
	/** @var string|null */
	private $homepage;

	/**
	 * @param string $title
	 */
	public function __construct(string $title)
	{
		$this->title = $title;
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
	public function getHomepage()
	{
		return $this->homepage;
	}

	/**
	 * @param string|null $homepage
	 * @return $this
	 */
	public function homepage(string $homepage = null)
	{
		$this->homepage = $homepage;
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
	 * @return self
	 */
	public static function create(string $title): self
	{
		return new self($title);
	}
}