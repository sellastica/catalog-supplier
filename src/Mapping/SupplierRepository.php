<?php
namespace Sellastica\CatalogSupplier\Mapping;

use Sellastica\Entity\Mapping\Repository;
use Sellastica\CatalogSupplier\Entity\Supplier;
use Sellastica\CatalogSupplier\Entity\ISupplierRepository;

/**
 * @property SupplierDao $dao
 * @see Supplier
 */
class SupplierRepository extends Repository implements ISupplierRepository
{
}