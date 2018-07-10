<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\IBuilder;
use Sellastica\Entity\Entity\IEntity;
use Sellastica\Entity\Entity\EntityFactory;

/**
 * @method CatalogSupplierUrl build(IBuilder $builder, bool $initialize = true, int $assignedId = null)
 * @see CatalogSupplierUrl
 */
class CatalogSupplierUrlFactory extends EntityFactory
{
	/**
	 * @param IEntity|CatalogSupplierUrl $entity
	 */
	public function doInitialize(IEntity $entity)
	{
	}

	/**
	 * @return string
	 */
	public function getEntityClass(): string
	{
		return CatalogSupplierUrl::class;
	}
}