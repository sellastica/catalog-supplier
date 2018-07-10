<?php
namespace Sellastica\CatalogSupplierUrl\Mapping;

use Sellastica\Entity\Mapping\DibiMapper;
use Sellastica\CatalogSupplierUrl\Entity\CatalogSupplierUrl;

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