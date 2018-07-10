<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\Configuration;
use Sellastica\Entity\Mapping\IRepository;

/**
 * @method Supplier find(int $id)
 * @method Supplier findOneBy(array $filterValues)
 * @method Supplier findOnePublishableBy(array $filterValues, Configuration $configuration = null)
 * @method Supplier[]|SupplierCollection findAll(Configuration $configuration = null)
 * @method Supplier[]|SupplierCollection findBy(array $filterValues, Configuration $configuration = null)
 * @method Supplier[]|SupplierCollection findByIds(array $idsArray, Configuration $configuration = null)
 * @method Supplier[]|SupplierCollection findPublishable(int $id)
 * @method Supplier[]|SupplierCollection findAllPublishable(Configuration $configuration = null)
 * @method Supplier[]|SupplierCollection findPublishableBy(array $filterValues, Configuration $configuration = null)
 * @see Supplier
 */
interface ISupplierRepository extends IRepository
{
}