<?php
namespace Supplierlication\Entity;

use Sellastica\Entity\Entity\IEntity;
use Sellastica\Entity\Relation\ManyToManyRelation;

class SupplierCategoryRelation extends ManyToManyRelation
{
	/** @var \Sellastica\CatalogSupplier\Entity\CatalogSupplier */
	private $supplier;
	/** @var \Sellastica\CatalogSupplier\Entity\CatalogCategory */
	private $category;
	/** @var int */
	private $command;


	/**
	 * @param \Sellastica\CatalogSupplier\Entity\CatalogSupplier $supplier
	 * @param \Sellastica\CatalogSupplier\Entity\CatalogCategory $category
	 * @param int $command
	 */
	public function __construct(
		\Sellastica\CatalogSupplier\Entity\CatalogSupplier $supplier,
		\Sellastica\CatalogSupplier\Entity\CatalogCategory $category,
		int $command
	)
	{
		$this->supplier = $supplier;
		$this->category = $category;
		$this->command = $command;
	}

	/**
	 * @inheritDoc
	 */
	public function getEntity(): IEntity
	{
		return $this->category;
	}

	/**
	 * @inheritDoc
	 */
	public function getRelatedEntity(): IEntity
	{
		return $this->supplier;
	}

	/**
	 * @inheritDoc
	 */
	protected function getCommand(): int
	{
		return $this->command;
	}

	/**
	 * @return array
	 */
	public function toArray(): array
	{
		return [
			'categoryId' => $this->category->getId(),
			'supplierId' => $this->supplier->getId(),
		];
	}

	/**
	 * @return bool
	 */
	public function isCrmDatabase(): bool
	{
		return true;
	}
}