<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\IBuilder;
use Sellastica\Entity\Entity\IEntity;
use Sellastica\Entity\Entity\EntityFactory;

/**
 * @method CatalogCategory build(IBuilder $builder, bool $initialize = true, int $assignedId = null)
 * @see CatalogCategory
 */
class CatalogCategoryFactory extends EntityFactory
{
	/**
	 * @param IEntity|CatalogCategory $entity
	 */
	public function doInitialize(IEntity $entity)
	{
	}

	/**
	 * @return string
	 */
	public function getEntityClass(): string
	{
		return CatalogCategory::class;
	}
}