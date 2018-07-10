<?php
namespace Sellastica\CatalogSupplier\Mapping;

use Sellastica\CatalogSupplier\Entity\CatalogSupplierUrl;
use Sellastica\Entity\Mapping\DibiMapper;

/**
 * @see CatalogSupplierUrl
 */
class CatalogSupplierUrlDibiMapper extends DibiMapper
{
	/**
	 * @param bool $databaseName
	 * @return string
	 */
	protected function getTableName($databaseName = false): string
	{
		return 'suppliers_catalogue_supplier_url';
	}
}