<?php
namespace Sellastica\CatalogSupplier\Mapping;

use Sellastica\CatalogSupplier\Entity\CatalogSupplier;
use Sellastica\CatalogSupplier\Entity\ICatalogSupplierRepository;
use Sellastica\Entity\Mapping\Repository;

/**
 * @property CatalogSupplierDao $dao
 * @see CatalogSupplier
 */
class CatalogSupplierRepository extends Repository implements ICatalogSupplierRepository
{
	use \Sellastica\DataGrid\Mapping\Dibi\TFilterRulesRepository;
}