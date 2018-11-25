<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\Configuration;
use Sellastica\Entity\Mapping\IRepository;

/**
 * @method CatalogCategory find(int $id)
 * @method CatalogCategory findOneBy(array $filterValues)
 * @method CatalogCategory findOnePublishableBy(array $filterValues, Configuration $configuration = null)
 * @method CatalogCategory[]|CatalogCategoryCollection findAll(Configuration $configuration = null)
 * @method CatalogCategory[]|CatalogCategoryCollection findBy(array $filterValues, Configuration $configuration = null)
 * @method CatalogCategory[]|CatalogCategoryCollection findByIds(array $idsArray, Configuration $configuration = null)
 * @method CatalogCategory[]|CatalogCategoryCollection findPublishable(int $id)
 * @method CatalogCategory[]|CatalogCategoryCollection findAllPublishable(Configuration $configuration = null)
 * @method CatalogCategory[]|CatalogCategoryCollection findPublishableBy(array $filterValues, Configuration $configuration = null)
 * @see CatalogCategory
 */
interface ICatalogCategoryRepository extends IRepository
{
}