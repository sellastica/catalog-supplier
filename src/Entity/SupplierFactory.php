<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\IBuilder;
use Sellastica\Entity\Entity\IEntity;
use Sellastica\Entity\Entity\EntityFactory;

/**
 * @method Supplier build(IBuilder $builder, bool $initialize = true, int $assignedId = null)
 * @see Supplier
 */
class SupplierFactory extends EntityFactory
{
	/**
	 * @param IEntity|Supplier $entity
	 */
	public function doInitialize(IEntity $entity)
	{
	}

	/**
	 * @return string
	 */
	public function getEntityClass(): string
	{
		return Supplier::class;
	}
}