<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\Entity\EntityFactory;
use Sellastica\Entity\Entity\IEntity;
use Sellastica\Entity\IBuilder;

/**
 * @method SupplierInquiry build(IBuilder $builder, bool $initialize = true, int $assignedId = null)
 * @see SupplierInquiry
 */
class SupplierInquiryFactory extends EntityFactory
{
	/**
	 * @param IEntity|SupplierInquiry $entity
	 */
	public function doInitialize(IEntity $entity)
	{
		$entity->setRelationService(new SupplierInquiryRelations($entity, $this->em));
	}

	/**
	 * @return string
	 */
	public function getEntityClass(): string
	{
		return SupplierInquiry::class;
	}
}