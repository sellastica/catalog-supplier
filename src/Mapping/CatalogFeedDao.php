<?php
namespace Sellastica\CatalogSupplier\Mapping;

/**
 * @see \Sellastica\CatalogSupplier\Entity\CatalogFeed
 * @property CatalogFeedDibiMapper $mapper
 */
class CatalogFeedDao extends \Sellastica\Entity\Mapping\Dao
{
	use \Sellastica\DataGrid\Mapping\Dibi\TFilterRulesDao;


	/**
	 * @param array $hosts
	 * @return \Sellastica\CatalogSupplier\Entity\CatalogFeedCollection|\Sellastica\Entity\Entity\EntityCollection
	 */
	public function findByHosts(array $hosts): \Sellastica\CatalogSupplier\Entity\CatalogFeedCollection
	{
		return $this->getEntitiesFromCacheOrStorage($this->mapper->findByHosts($hosts));
	}

	/**
	 * @inheritDoc
	 */
	protected function getBuilder(
		$data,
		$first = null,
		$second = null
	): \Sellastica\Entity\IBuilder
	{
		$data->type = \Suppliers\Model\FeedType::from($data->type);
		$data->defaultCurrency = \Sellastica\Localization\Model\Currency::from($data->defaultCurrency);
		return \Sellastica\CatalogSupplier\Entity\CatalogFeedBuilder::create(
			$data->supplierId,
			$data->type,
			$data->title,
			$data->itemXPath,
			$data->converterClass,
			$data->defaultCurrency
		)->hydrate($data);
	}

	/**
	 * @return \Sellastica\CatalogSupplier\Entity\CatalogFeedCollection
	 */
	public function getEmptyCollection(): \Sellastica\Entity\Entity\EntityCollection
	{
		return new \Sellastica\CatalogSupplier\Entity\CatalogFeedCollection;
	}
}