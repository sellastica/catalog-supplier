<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\Configuration;
use Sellastica\Entity\Mapping\IRepository;

/**
 * @method CatalogSupplierUrl find(int $id)
 * @method CatalogSupplierUrl findOneBy(array $filterValues)
 * @method CatalogSupplierUrl findOnePublishableBy(array $filterValues, Configuration $configuration = null)
 * @method CatalogSupplierUrl[]|CatalogSupplierUrlCollection findAll(Configuration $configuration = null)
 * @method CatalogSupplierUrl[]|CatalogSupplierUrlCollection findBy(array $filterValues, Configuration $configuration = null)
 * @method CatalogSupplierUrl[]|CatalogSupplierUrlCollection findByIds(array $idsArray, Configuration $configuration = null)
 * @method CatalogSupplierUrl[]|CatalogSupplierUrlCollection findPublishable(int $id)
 * @method CatalogSupplierUrl[]|CatalogSupplierUrlCollection findAllPublishable(Configuration $configuration = null)
 * @method CatalogSupplierUrl[]|CatalogSupplierUrlCollection findPublishableBy(array $filterValues, Configuration $configuration = null)
 * @see CatalogSupplierUrl
 */
interface ICatalogSupplierUrlRepository extends IRepository
{
}