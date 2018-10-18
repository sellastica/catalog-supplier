<?php
namespace Sellastica\CatalogSupplier\Mapping;

/**
 * @see \Sellastica\CatalogSupplier\Entity\CatalogFeedProject
 */
class CatalogFeedProjectDibiMapper extends \Sellastica\Entity\Mapping\DibiMapper
{
	/**
	 * @return bool
	 */
	protected function isInCrmDatabase(): bool
	{
		return true;
	}

	/**
	 * @param bool $databaseName
	 * @return string
	 */
	protected function getTableName($databaseName = false): string
	{
		return ($databaseName ? $this->environment->getCommonCrmDatabaseName() . '.' : '')
			. 'suppliers_feed_project';
	}
}