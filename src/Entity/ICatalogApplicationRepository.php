<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\Configuration;
use Sellastica\Entity\Mapping\IRepository;

/**
 * @method CatalogApplication find(int $id)
 * @method CatalogApplication findOneBy(array $filterValues)
 * @method CatalogApplication findOnePublishableBy(array $filterValues, Configuration $configuration = null)
 * @method CatalogApplication[]|CatalogApplicationCollection findAll(Configuration $configuration = null)
 * @method CatalogApplication[]|CatalogApplicationCollection findBy(array $filterValues, Configuration $configuration = null)
 * @method CatalogApplication[]|CatalogApplicationCollection findByIds(array $idsArray, Configuration $configuration = null)
 * @method CatalogApplication[]|CatalogApplicationCollection findPublishable(int $id)
 * @method CatalogApplication[]|CatalogApplicationCollection findAllPublishable(Configuration $configuration = null)
 * @method CatalogApplication[]|CatalogApplicationCollection findPublishableBy(array $filterValues, Configuration $configuration = null)
 * @see CatalogApplication
 */
interface ICatalogApplicationRepository extends IRepository
{
}