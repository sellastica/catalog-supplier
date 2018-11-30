<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\Entity\EntityFactory;
use Sellastica\Entity\Entity\IEntity;
use Sellastica\Entity\IBuilder;

/**
 * @method CatalogSupplier build(IBuilder $builder, bool $initialize = true, int $assignedId = null)
 * @see CatalogSupplier
 */
class CatalogSupplierFactory extends EntityFactory
{
	/**
	 * @param IEntity|CatalogSupplier $entity
	 */
	public function doInitialize(IEntity $entity)
	{
		$entity->setRelationService(new CatalogSupplierRelations($entity, $this->em));
	}

	/**
	 * @return string
	 */
	public function getEntityClass(): string
	{
		return CatalogSupplier::class;
	}
}