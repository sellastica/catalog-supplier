<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\Entity\EntityFactory;
use Sellastica\Entity\Entity\IEntity;
use Sellastica\Entity\IBuilder;

/**
 * @method \Sellastica\CatalogSupplier\Entity\ProjectFeedLog build(IBuilder $builder, bool $initialize = true, int $assignedId = null)
 * @see ProjectFeedLog
 */
class ProjectFeedLogFactory extends EntityFactory
{
	/**
	 * @param IEntity|\Sellastica\CatalogSupplier\Entity\ProjectFeedLog $entity
	 */
	public function doInitialize(IEntity $entity)
	{
	}

	/**
	 * @return string
	 */
	public function getEntityClass(): string
	{
		return \Sellastica\CatalogSupplier\Entity\ProjectFeedLog::class;
	}
}