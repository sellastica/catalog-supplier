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
	private $homepage;
	/** @var string|null */
	private $logo;

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
	 * @return string|null
	 */
	public function getLogo()
	{
		return $this->logo;
	}

	/**
	 * @param string|null $logo
	 * @return $this
	 */
	public function logo(string $logo = null)
	{
		$this->logo = $logo;
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