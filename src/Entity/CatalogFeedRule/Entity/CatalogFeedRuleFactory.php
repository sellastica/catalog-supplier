<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\Entity\EntityFactory;
use Sellastica\Entity\Entity\IEntity;
use Sellastica\Entity\IBuilder;

/**
 * @method CatalogFeedRule build(IBuilder $builder, bool $initialize = true, int $assignedId = null)
 * @see CatalogFeedRule
 */
class CatalogFeedRuleFactory extends EntityFactory
{
	/**
	 * @param IEntity|CatalogFeedRule $entity
	 */
	public function doInitialize(IEntity $entity)
	{
	}

	/**
	 * @return string
	 */
	public function getEntityClass(): string
	{
		return CatalogFeedRule::class;
	}
}