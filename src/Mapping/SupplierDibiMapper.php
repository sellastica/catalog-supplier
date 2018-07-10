<?php
namespace Sellastica\CatalogSupplier\Mapping;

/**
 * @see \Sellastica\CatalogSupplier\Entity\Supplier
 */
class SupplierDibiMapper extends \Sellastica\Entity\Mapping\DibiMapper
{
	/**
	 * @param bool $databaseName
	 * @return string
	 */
	protected function getTableName($databaseName = false): string
	{
		return 'suppliers_supplier';
	}
}