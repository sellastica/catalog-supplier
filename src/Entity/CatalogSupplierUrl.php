<?php
namespace Sellastica\CatalogSupplierUrl\Entity;

/**
 * @generate-builder
 * @see CatalogSupplierUrlBuilder
 */
class CatalogSupplierUrl extends \Sellastica\Entity\Entity\AbstractEntity
	implements \Sellastica\Entity\Entity\IEntity
{
	use \Sellastica\Entity\Entity\TAbstractEntity;

	/** @var string @required */
	private $host;


	/**
	 * @param CatalogSupplierUrlBuilder $builder
	 */
	public function __construct(CatalogSupplierUrlBuilder $builder)
	{
		$this->hydrate($builder);
	}

	/**
	 * @return bool
	 */
	public static function isIdGeneratedByStorage(): bool
	{
		return true;
	}

	/**
	 * @return string
	 */
	public function getHost(): string
	{
		return $this->host;
	}

	/**
	 * @param string $host
	 */
	public function setHost(string $host): void
	{
		$this->host = $host;
	}

	/**
	 * @return array
	 */
	public function toArray(): array
	{
		return [
			'host' => $this->host,
		];
	}
}