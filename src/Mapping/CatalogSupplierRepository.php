<?php
namespace Sellastica\CatalogSupplier\Mapping;

use Sellastica\Entity\Mapping\Repository;
use Sellastica\CatalogSupplier\Entity\CatalogSupplier;
use Sellastica\CatalogSupplier\Entity\ICatalogSupplierRepository;

/**
 * @property CatalogSupplierDao $dao
 * @see CatalogSupplier
 */
class CatalogSupplierRepository extends Repository implements ICatalogSupplierRepository
{
	use \Sellastica\DataGrid\Mapping\Dibi\TFilterRulesRepository;
}