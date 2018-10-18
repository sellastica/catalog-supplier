<?php
namespace Sellastica\CatalogSupplier\Mapping;

use Sellastica\Entity\Mapping\RepositoryProxy;
use Sellastica\CatalogSupplier\Entity\ICatalogSupplierRepository;
use Sellastica\CatalogSupplier\Entity\CatalogSupplier;

/**
 * @method CatalogSupplierRepository getRepository()
 * @see CatalogSupplier
 */
class CatalogSupplierRepositoryProxy extends RepositoryProxy implements ICatalogSupplierRepository
{
	use \Sellastica\DataGrid\Mapping\Dibi\TFilterRulesRepositoryProxy;
}