<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\IBuilder;
use Sellastica\Entity\TBuilder;

/**
 * @see CatalogApplication
 */
class CatalogApplicationBuilder implements IBuilder
{
	use TBuilder;

	/** @var string */
	private $title;
	/** @var string|null */
	private $perex;
	/** @var string|null */
	private $description;
	/** @var bool */
	private $visible = true;

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
	public function getPerex()
	{
		return $this->perex;
	}

	/**
	 * @param string|null $perex
	 * @return $this
	 */
	public function perex(string $perex = null)
	{
		$this->perex = $perex;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * @param string|null $description
	 * @return $this
	 */
	public function description(string $description = null)
	{
		$this->description = $description;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function getVisible(): bool
	{
		return $this->visible;
	}

	/**
	 * @param bool $visible
	 * @return $this
	 */
	public function visible(bool $visible = true)
	{
		$this->visible = $visible;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function generateId(): bool
	{
		return !CatalogApplication::isIdGeneratedByStorage();
	}

	/**
	 * @return CatalogApplication
	 */
	public function build(): CatalogApplication
	{
		return new CatalogApplication($this);
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