<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\IBuilder;
use Sellastica\Entity\TBuilder;

/**
 * @see CatalogCategory
 */
class CatalogCategoryBuilder implements IBuilder
{
	use TBuilder;

	/** @var string */
	private $title;

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
	 * @return bool
	 */
	public function generateId(): bool
	{
		return !CatalogCategory::isIdGeneratedByStorage();
	}

	/**
	 * @return CatalogCategory
	 */
	public function build(): CatalogCategory
	{
		return new CatalogCategory($this);
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