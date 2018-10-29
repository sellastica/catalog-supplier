<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\IBuilder;
use Sellastica\Entity\Entity\IEntity;
use Sellastica\Entity\Entity\EntityFactory;

/**
 * @method InstalledCatalogApplication build(IBuilder $builder, bool $initialize = true, int $assignedId = null)
 * @see InstalledCatalogApplication
 */
class InstalledCatalogApplicationFactory extends EntityFactory
{
	/**
	 * @param IEntity|InstalledCatalogApplication $entity
	 */
	public function doInitialize(IEntity $entity)
	{
	}

	/**
	 * @return string
	 */
	public function getEntityClass(): string
	{
		return InstalledCatalogApplication::class;
	}
}