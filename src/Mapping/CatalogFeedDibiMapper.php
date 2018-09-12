<?php
namespace Sellastica\CatalogSupplier\Mapping;

/**
 * @see \Sellastica\CatalogSupplier\Entity\CatalogFeed
 */
class CatalogFeedDibiMapper extends \Sellastica\Entity\Mapping\DibiMapper
{
	use \Sellastica\DataGrid\Mapping\Dibi\TFilterRulesDibiMapper;


	/**
	 * @param array $hosts
	 * @return array
	 */
	public function findByHosts(array $hosts): array
	{
		return $this->database->select('feedId')
			->from('%n.suppliers_feed_url', $this->environment->getCrmDatabaseName())
			->where('host IN (%sN)', $hosts)
			->fetchPairs();
	}

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
			. 'suppliers_feed';
	}
}