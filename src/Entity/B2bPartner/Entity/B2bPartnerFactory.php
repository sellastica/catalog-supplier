<?php
namespace Sellastica\CatalogSupplier\Entity\B2bPartner\Entity;

use Sellastica\Entity\IBuilder;
use Sellastica\Entity\Entity\IEntity;
use Sellastica\Entity\Entity\EntityFactory;

/**
 * @method B2bPartner build(IBuilder $builder, bool $initialize = true, int $assignedId = null)
 * @see B2bPartner
 */
class B2bPartnerFactory extends EntityFactory
{
	/**
	 * @param IEntity|B2bPartner $entity
	 */
	public function doInitialize(IEntity $entity)
	{
	}

	/**
	 * @return string
	 */
	public function getEntityClass(): string
	{
		return B2bPartner::class;
	}
}