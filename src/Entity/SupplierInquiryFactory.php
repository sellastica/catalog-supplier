<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\IBuilder;
use Sellastica\Entity\Entity\IEntity;
use Sellastica\Entity\Entity\EntityFactory;

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
	}

	/**
	 * @return string
	 */
	public function getEntityClass(): string
	{
		return SupplierInquiry::class;
	}
}