<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\Configuration;
use Sellastica\Entity\Mapping\IRepository;

/**
 * @method SupplierOrder find(int $id)
 * @method SupplierOrder findOneBy(array $filterValues)
 * @method SupplierOrder findOnePublishableBy(array $filterValues, Configuration $configuration = null)
 * @method SupplierOrder[]|SupplierOrderCollection findAll(Configuration $configuration = null)
 * @method SupplierOrder[]|SupplierOrderCollection findBy(array $filterValues, Configuration $configuration = null)
 * @method SupplierOrder[]|SupplierOrderCollection findByIds(array $idsArray, Configuration $configuration = null)
 * @method SupplierOrder[]|SupplierOrderCollection findPublishable(int $id)
 * @method SupplierOrder[]|SupplierOrderCollection findAllPublishable(Configuration $configuration = null)
 * @method SupplierOrder[]|SupplierOrderCollection findPublishableBy(array $filterValues, Configuration $configuration = null)
 * @see SupplierOrder
 */
interface ISupplierOrderRepository extends IRepository
{
}