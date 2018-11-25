<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\Entity\IEntity;
use Sellastica\Entity\Relation\ManyToManyRelation;

class SupplierCategoryRelation extends ManyToManyRelation
{
	/** @var CatalogSupplier */
	private $supplier;
	/** @var CatalogCategory */
	private $category;
	/** @var int */
	private $command;


	/**
	 * @param CatalogSupplier $supplier
	 * @param CatalogCategory $category
	 * @param int $command
	 */
	public function __construct(
		CatalogSupplier $supplier,
		CatalogCategory $category,
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
	 * @return string
	 */
	public function getTableName(): string
	{
		return 'crm_all.suppliers_supplier_catetory_rel';
	}
}