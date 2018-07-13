<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\IBuilder;
use Sellastica\Entity\Entity\IEntity;
use Sellastica\Entity\Entity\EntityFactory;

/**
 * @method CatalogFeedUrl build(IBuilder $builder, bool $initialize = true, int $assignedId = null)
 * @see CatalogFeedUrl
 */
class CatalogFeedUrlFactory extends EntityFactory
{
	/**
	 * @param IEntity|CatalogFeedUrl $entity
	 */
	public function doInitialize(IEntity $entity)
	{
	}

	/**
	 * @return string
	 */
	public function getEntityClass(): string
	{
		return CatalogFeedUrl::class;
	}
}