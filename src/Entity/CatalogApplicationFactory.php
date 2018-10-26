<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\IBuilder;
use Sellastica\Entity\Entity\IEntity;
use Sellastica\Entity\Entity\EntityFactory;

/**
 * @method CatalogApplication build(IBuilder $builder, bool $initialize = true, int $assignedId = null)
 * @see CatalogApplication
 */
class CatalogApplicationFactory extends EntityFactory
{
	/**
	 * @param IEntity|CatalogApplication $entity
	 */
	public function doInitialize(IEntity $entity)
	{
	}

	/**
	 * @return string
	 */
	public function getEntityClass(): string
	{
		return CatalogApplication::class;
	}
}