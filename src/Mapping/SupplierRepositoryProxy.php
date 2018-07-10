<?php
namespace Sellastica\CatalogSupplier\Mapping;

use Sellastica\Entity\Mapping\RepositoryProxy;
use Sellastica\CatalogSupplier\Entity\ISupplierRepository;
use Sellastica\CatalogSupplier\Entity\Supplier;

/**
 * @method SupplierRepository getRepository()
 * @see Supplier
 */
class SupplierRepositoryProxy extends RepositoryProxy implements ISupplierRepository
{
}