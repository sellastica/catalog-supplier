<?php
namespace Sellastica\CatalogSupplierUrl\Entity;

use Sellastica\Entity\IBuilder;
use Sellastica\Entity\TBuilder;

/**
 * @see CatalogSupplierUrl
 */
class CatalogSupplierUrlBuilder implements IBuilder
{
	use TBuilder;

	/** @var string */
	private $host;

	/**
	 * @param string $host
	 */
	public function __construct(string $host)
	{
		$this->host = $host;
	}

	/**
	 * @return string
	 */
	public function getHost(): string
	{
		return $this->host;
	}

	/**
	 * @return bool
	 */
	public function generateId(): bool
	{
		return !CatalogSupplierUrl::isIdGeneratedByStorage();
	}

	/**
	 * @return CatalogSupplierUrl
	 */
	public function build(): CatalogSupplierUrl
	{
		return new CatalogSupplierUrl($this);
	}

	/**
	 * @param string $host
	 * @return self
	 */
	public static function create(string $host): self
	{
		return new self($host);
	}
}