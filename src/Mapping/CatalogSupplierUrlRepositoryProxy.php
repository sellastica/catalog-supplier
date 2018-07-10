<?php
namespace Sellastica\CatalogSupplierUrl\Mapping;

use Sellastica\Entity\Mapping\RepositoryProxy;
use Sellastica\CatalogSupplierUrl\Entity\ICatalogSupplierUrlRepository;
use Sellastica\CatalogSupplierUrl\Entity\CatalogSupplierUrl;

/**
 * @method CatalogSupplierUrlRepository getRepository()
 * @see CatalogSupplierUrl
 */
class CatalogSupplierUrlRepositoryProxy extends RepositoryProxy implements ICatalogSupplierUrlRepository
{
}