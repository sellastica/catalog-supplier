<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\Entity\EntityFactory;
use Sellastica\Entity\Entity\IEntity;
use Sellastica\Entity\IBuilder;

/**
 * @method CatalogFeed build(IBuilder $builder, bool $initialize = true, int $assignedId = null)
 * @see CatalogFeed
 */
class CatalogFeedFactory extends EntityFactory
{
	/**
	 * @param IEntity|CatalogFeed $entity
	 */
	public function doInitialize(IEntity $entity)
	{
		$entity->setRelationService(new CatalogFeedRelations($entity, $this->em));
	}

	/**
	 * @return string
	 */
	public function getEntityClass(): string
	{
		return CatalogFeed::class;
	}
}