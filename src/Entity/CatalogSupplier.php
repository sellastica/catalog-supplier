<?php
namespace Sellastica\CatalogSupplier\Entity;

/**
 * @generate-builder
 * @see CatalogSupplierBuilder
 * 
 * @property CatalogSupplierRelations $relationService
 */
class CatalogSupplier extends \Sellastica\Entity\Entity\AbstractEntity
	implements \Sellastica\Entity\Entity\IEntity
{
	use \Sellastica\Entity\Entity\TAbstractEntity;

	/** @var string @required */
	private $title;
	/** @var string @required */
	private $code;
	/** @var string|null @optional */
	private $xsd;


	/**
	 * @param CatalogSupplierBuilder $builder
	 */
	public function __construct(CatalogSupplierBuilder $builder)
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
	public function getTitle(): string
	{
		return $this->title;
	}

	/**
	 * @param string $title
	 */
	public function setTitle(string $title): void
	{
		$this->title = $title;
	}

	/**
	 * @return string
	 */
	public function getCode(): string
	{
		return $this->code;
	}

	/**
	 * @param string $code
	 */
	public function setCode(string $code): void
	{
		$this->code = $code;
	}

	/**
	 * @return null|string
	 */
	public function getXsd(): ?string
	{
		return $this->xsd;
	}

	/**
	 * @param null|string $xsd
	 */
	public function setXsd(?string $xsd): void
	{
		$this->xsd = $xsd;
	}

	/**
	 * @return CatalogSupplierUrlCollection
	 */
	public function getUrls(): CatalogSupplierUrlCollection
	{
		return $this->relationService->getUrls();
	}

	/**
	 * @return array
	 */
	public function toArray(): array
	{
		return [
			'title' => $this->title,
			'code' => $this->code,
			'xsd' => $this->xsd,
		];
	}
}