<?php
namespace Sellastica\CatalogSupplier\Mapping;

use Sellastica\CatalogSupplier\Entity\CatalogFeedUrl;
use Sellastica\Entity\Mapping\DibiMapper;

/**
 * @see CatalogFeedUrl
 */
class CatalogFeedUrlDibiMapper extends DibiMapper
{
	/**
	 * @param bool $databaseName
	 * @return string
	 */
	protected function getTableName($databaseName = false): string
	{
		return 'suppliers_feed_url';
	}
}