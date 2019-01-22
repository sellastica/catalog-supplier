<?php
namespace Sellastica\CatalogSupplier\Mapping;

/**
 * @see \Sellastica\CatalogSupplier\Entity\CatalogFeed
 */
class CatalogFeedDibiMapper extends \Sellastica\Entity\Mapping\DibiMapper
{
	use \Sellastica\DataGrid\Mapping\Dibi\TFilterRulesDibiMapper;


	/**
	 * @param int $categoryId
	 * @param \Sellastica\Entity\Configuration|null $configuration
	 * @return array
	 */
	public function findByCategoryId(
		int $categoryId,
		\Sellastica\Entity\Configuration $configuration = null
	): array
	{
		return $this->getResourceWithIds($configuration)
			//->innerJoin('crm_all.suppliers_feed sf')
			//->on('sf.id = %n.supplierId', $this->getTableName())
			->innerJoin('crm_all.suppliers_supplier_category_rel scr')
			->on('scr.supplierId = %n.supplierId', $this->getTableName())
			->where('scr.categoryId = %i', $categoryId)
			->fetchPairs();
	}

	/**
	 * @param int $categoryId
	 * @param \Sellastica\Entity\Configuration|null $configuration
	 * @return array
	 */
	public function findVisibleByCategoryId(
		int $categoryId,
		\Sellastica\Entity\Configuration $configuration = null
	): array
	{
		return $this->getPublishableResourceWithIds($configuration)
			->innerJoin('crm_all.suppliers_supplier_category_rel scr')
			->on('scr.supplierId = %n.supplierId', $this->getTableName())
			->where('scr.categoryId = %i', $categoryId)
			->where('%n.visible = 1', $this->getTableName())
			->fetchPairs();
	}

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