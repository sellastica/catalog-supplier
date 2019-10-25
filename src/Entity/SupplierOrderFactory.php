<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\IBuilder;
use Sellastica\Entity\Entity\IEntity;
use Sellastica\Entity\Entity\EntityFactory;

/**
 * @method SupplierOrder build(IBuilder $builder, bool $initialize = true, int $assignedId = null)
 * @see SupplierOrder
 */
class SupplierOrderFactory extends EntityFactory
{
	/**
	 * @param IEntity|SupplierOrder $entity
	 */
	public function doInitialize(IEntity $entity)
	{
		$entity->setRelationService(new SupplierOrderRelations($entity, $this->em));
	}

	/**
	 * @return string
	 */
	public function getEntityClass(): string
	{
		return SupplierOrder::class;
	}
}