<?php
namespace Sellastica\CatalogSupplier\Mapping;

use Sellastica\Entity\Mapping\Repository;
use Sellastica\CatalogSupplier\Entity\CatalogCategory;
use Sellastica\CatalogSupplier\Entity\ICatalogCategoryRepository;

/**
 * @property CatalogCategoryDao $dao
 * @see CatalogCategory
 */
class CatalogCategoryRepository extends Repository implements ICatalogCategoryRepository
{
}