<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\Entity\EntityFactory;
use Sellastica\Entity\Entity\IEntity;
use Sellastica\Entity\IBuilder;

/**
 * @method CatalogFeedProject build(IBuilder $builder, bool $initialize = true, int $assignedId = null)
 * @see CatalogFeedProject
 */
class CatalogFeedProjectFactory extends EntityFactory
{
	/**
	 * @param IEntity|CatalogFeedProject $entity
	 */
	public function doInitialize(IEntity $entity)
	{
		$entity->setRelationService(new CatalogFeedProjectRelations($entity, $this->em));
	}

	/**
	 * @return string
	 */
	public function getEntityClass(): string
	{
		return CatalogFeedProject::class;
	}
}