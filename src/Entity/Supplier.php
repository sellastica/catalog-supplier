<?php
namespace Sellastica\CatalogSupplier\Entity;

/**
 * @generate-builder
 * @see CatalogSupplierBuilder
 */
class Supplier extends \Sellastica\Entity\Entity\AbstractEntity
	implements \Sellastica\Entity\Entity\IEntity
{
	use \Sellastica\Entity\Entity\TAbstractEntity;

	/** @var string @required */
	private $title;
	/** @var string @required */
	private $code;


	/**
	 * @param \Sellastica\CatalogSupplier\Entity\CatalogSupplierBuilder $builder
	 */
	public function __construct(\Sellastica\CatalogSupplier\Entity\CatalogSupplierBuilder $builder)
	{
		$this->hydrate($builder);
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
	 * @return array
	 */
	public function toArray(): array
	{
		return [
				'title' => $this->title,
				'code' => $this->code,
			];
	}
}