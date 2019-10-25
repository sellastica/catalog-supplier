<?php
namespace Sellastica\CatalogSupplier\Mapping;

/**
 * @see \Sellastica\CatalogSupplier\Entity\SupplierOrder
 */
class SupplierOrderDibiMapper extends \Sellastica\Entity\Mapping\DibiMapper
{
	use \Sellastica\DataGrid\Mapping\Dibi\TFilterRulesDibiMapper;

	/**
	 * @param bool $databaseName
	 * @return string
	 */
	protected function getTableName($databaseName = false): string
	{
		return ($databaseName ? $this->environment->getNapojSeCrmDatabaseName() . '.' : '')
			. 'suppliers_order';
	}
}