<?php
namespace Sellastica\CatalogSupplier\Mapping;

/**
 * @see \Sellastica\CatalogSupplier\Entity\CatalogFeedOption
 */
class CatalogFeedOptionDibiMapper extends \Sellastica\Entity\Mapping\DibiMapper
{
	/**
	 * @param bool $databaseName
	 * @return string
	 */
	protected function getTableName($databaseName = false): string
	{
		return ($databaseName ? $this->environment->getNapojSeCrmDatabaseName() . '.' : '')
			. 'suppliers_feed_option';
	}
}