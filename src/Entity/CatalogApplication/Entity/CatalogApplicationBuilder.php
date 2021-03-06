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
	/** @var string */
	private $code;
	/** @var string|null */
	private $perex;
	/** @var string|null */
	private $description;
	/** @var bool */
	private $shoptet = false;
	/** @var bool */
	private $visible = true;
	/** @var bool */
	private $global = false;
	/** @var bool */
	private $settings = true;

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
	public function getShoptet(): bool
	{
		return $this->shoptet;
	}

	/**
	 * @param bool $shoptet
	 * @return $this
	 */
	public function shoptet(bool $shoptet)
	{
		$this->shoptet = $shoptet;
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
	public function getGlobal(): bool
	{
		return $this->global;
	}

	/**
	 * @param bool $global
	 * @return $this
	 */
	public function global(bool $global)
	{
		$this->global = $global;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function getSettings(): bool
	{
		return $this->settings;
	}

	/**
	 * @param bool $settings
	 * @return $this
	 */
	public function settings(bool $settings = true)
	{
		$this->settings = $settings;
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