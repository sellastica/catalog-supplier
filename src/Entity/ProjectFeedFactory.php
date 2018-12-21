<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\Entity\EntityFactory;
use Sellastica\Entity\Entity\IEntity;
use Sellastica\Entity\IBuilder;

/**
 * @method \Sellastica\CatalogSupplier\Entity\ProjectFeed build(IBuilder $builder, bool $initialize = true, int $assignedId = null)
 * @see ProjectFeed
 */
class ProjectFeedFactory extends EntityFactory
{
	/**
	 * @param IEntity|\Sellastica\CatalogSupplier\Entity\ProjectFeed $entity
	 */
	public function doInitialize(IEntity $entity)
	{
		$entity->setRelationService(new ProjectFeedRelations($entity, $this->em));
	}

	/**
	 * @return string
	 */
	public function getEntityClass(): string
	{
		return \Sellastica\CatalogSupplier\Entity\ProjectFeed::class;
	}
}