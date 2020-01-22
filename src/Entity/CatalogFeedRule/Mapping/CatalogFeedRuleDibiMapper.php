<?php
namespace Sellastica\CatalogSupplier\Mapping;

/**
 * @see \Sellastica\CatalogSupplier\Entity\CatalogFeedRule
 */
class CatalogFeedRuleDibiMapper extends \Sellastica\Entity\Mapping\DibiMapper
{
	/**
	 * @param bool $databaseName
	 * @return string
	 */
	protected function getTableName($databaseName = false): string
	{
		return ($databaseName ? $this->environment->getNapojseCrmDatabaseName() . '.' : '')
			. 'suppliers_feed_rule';
	}
}