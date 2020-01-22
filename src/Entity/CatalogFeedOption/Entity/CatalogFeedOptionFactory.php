<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\IBuilder;
use Sellastica\Entity\Entity\IEntity;
use Sellastica\Entity\Entity\EntityFactory;

/**
 * @method CatalogFeedOption build(IBuilder $builder, bool $initialize = true, int $assignedId = null)
 * @see CatalogFeedOption
 */
class CatalogFeedOptionFactory extends EntityFactory
{
	/**
	 * @param IEntity|CatalogFeedOption $entity
	 */
	public function doInitialize(IEntity $entity)
	{
	}

	/**
	 * @return string
	 */
	public function getEntityClass(): string
	{
		return CatalogFeedOption::class;
	}
}