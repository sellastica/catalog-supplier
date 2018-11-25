<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\Event\ManageMNRelationDomainEvent;
use Sellastica\Entity\Relation\ManyToManyRelation;

/**
 * @method CatalogSupplier getAffectedEntity(): IEntity
 * @method CatalogCategory getAffector(): IEntity
 */
class SupplierCategoryAdded extends ManageMNRelationDomainEvent
{
	/**
	 * @param CatalogSupplier $supplier
	 * @param CatalogCategory $category
	 */
	public function __construct(
		CatalogSupplier $supplier,
		CatalogCategory $category
	)
	{
		parent::__construct($supplier, $category);
	}

	/**
	 * @inheritDoc
	 */
	public function getManyToManyRelation(): ManyToManyRelation
	{
		return new SupplierCategoryRelation(
			$this->getAffectedEntity(), $this->getAffector(), ManyToManyRelation::PERSIST
		);
	}
}