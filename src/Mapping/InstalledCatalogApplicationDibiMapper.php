<?php
namespace Sellastica\CatalogSupplier\Mapping;

/**
 * @see \Sellastica\CatalogSupplier\Entity\InstalledCatalogApplication
 */
class InstalledCatalogApplicationDibiMapper extends \Sellastica\Entity\Mapping\DibiMapper
{
	/**
	 * @param bool $databaseName
	 * @return string
	 */
	protected function getTableName($databaseName = false): string
	{
		return ($databaseName ? $this->environment->getNapojseCrmDatabaseName() . '.' : '')
			. 'suppliers_application_project';
	}
}