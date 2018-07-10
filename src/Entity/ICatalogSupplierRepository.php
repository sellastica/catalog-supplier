<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\Configuration;
use Sellastica\Entity\Mapping\IRepository;

/**
 * @method CatalogSupplier find(int $id)
 * @method CatalogSupplier findOneBy(array $filterValues)
 * @method CatalogSupplier findOnePublishableBy(array $filterValues, Configuration $configuration = null)
 * @method CatalogSupplier[]|CatalogSupplierCollection findAll(Configuration $configuration = null)
 * @method CatalogSupplier[]|CatalogSupplierCollection findBy(array $filterValues, Configuration $configuration = null)
 * @method CatalogSupplier[]|CatalogSupplierCollection findByIds(array $idsArray, Configuration $configuration = null)
 * @method CatalogSupplier[]|CatalogSupplierCollection findPublishable(int $id)
 * @method CatalogSupplier[]|CatalogSupplierCollection findAllPublishable(Configuration $configuration = null)
 * @method CatalogSupplier[]|CatalogSupplierCollection findPublishableBy(array $filterValues, Configuration $configuration = null)
 * @see CatalogSupplier
 */
interface ICatalogSupplierRepository extends IRepository
{
}