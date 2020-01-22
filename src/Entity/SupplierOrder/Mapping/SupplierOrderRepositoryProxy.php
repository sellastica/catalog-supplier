<?php
namespace Sellastica\CatalogSupplier\Mapping;

use Sellastica\Entity\Mapping\RepositoryProxy;
use Sellastica\CatalogSupplier\Entity\ISupplierOrderRepository;
use Sellastica\CatalogSupplier\Entity\SupplierOrder;

/**
 * @method SupplierOrderRepository getRepository()
 * @see SupplierOrder
 */
class SupplierOrderRepositoryProxy extends RepositoryProxy implements ISupplierOrderRepository
{
	use \Sellastica\DataGrid\Mapping\Dibi\TFilterRulesRepositoryProxy;
}