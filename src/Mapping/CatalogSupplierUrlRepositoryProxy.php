<?php
namespace Sellastica\CatalogSupplier\Mapping;

use Sellastica\Entity\Mapping\RepositoryProxy;
use Sellastica\CatalogSupplier\Entity\ICatalogSupplierUrlRepository;
use Sellastica\CatalogSupplier\Entity\CatalogSupplierUrl;

/**
 * @method CatalogSupplierUrlRepository getRepository()
 * @see CatalogSupplierUrl
 */
class CatalogSupplierUrlRepositoryProxy extends RepositoryProxy implements ICatalogSupplierUrlRepository
{
}