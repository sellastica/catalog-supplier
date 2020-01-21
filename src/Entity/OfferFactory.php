<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\IBuilder;
use Sellastica\Entity\Entity\IEntity;
use Sellastica\Entity\Entity\EntityFactory;

/**
 * @method Offer build(IBuilder $builder, bool $initialize = true, int $assignedId = null)
 * @see Offer
 */
class OfferFactory extends EntityFactory
{
	/**
	 * @param IEntity|Offer $entity
	 */
	public function doInitialize(IEntity $entity)
	{
		$entity->setRelationService(new OfferRelations($entity, $this->em));
	}

	/**
	 * @return string
	 */
	public function getEntityClass(): string
	{
		return Offer::class;
	}
}