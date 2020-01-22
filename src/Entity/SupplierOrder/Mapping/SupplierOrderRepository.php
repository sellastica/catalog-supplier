<?php
namespace Sellastica\CatalogSupplier\Mapping;

use Sellastica\Entity\Mapping\Repository;
use Sellastica\CatalogSupplier\Entity\SupplierOrder;
use Sellastica\CatalogSupplier\Entity\ISupplierOrderRepository;

/**
 * @property SupplierOrderDao $dao
 * @see SupplierOrder
 */
class SupplierOrderRepository extends Repository implements ISupplierOrderRepository
{
	use \Sellastica\DataGrid\Mapping\Dibi\TFilterRulesRepository;
}