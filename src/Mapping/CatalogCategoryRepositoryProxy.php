<?php
namespace Sellastica\CatalogSupplier\Mapping;

use Sellastica\Entity\Mapping\RepositoryProxy;
use Sellastica\CatalogSupplier\Entity\ICatalogCategoryRepository;
use Sellastica\CatalogSupplier\Entity\CatalogCategory;

/**
 * @method CatalogCategoryRepository getRepository()
 * @see CatalogCategory
 */
class CatalogCategoryRepositoryProxy extends RepositoryProxy implements ICatalogCategoryRepository
{
}