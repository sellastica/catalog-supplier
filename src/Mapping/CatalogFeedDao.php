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
	 * @param int $categoryId
	 * @param \Sellastica\Entity\Configuration|null $configuration
	 * @return \Sellastica\CatalogSupplier\Entity\CatalogFeedCollection
	 */
	public function findByCategoryId(
		int $categoryId,
		\Sellastica\Entity\Configuration $configuration = null
	): \Sellastica\CatalogSupplier\Entity\CatalogFeedCollection
	{
		return $this->getEntitiesFromCacheOrStorage($this->mapper->findByCategoryId($categoryId, $configuration));
	}

	/**
	 * @param int $categoryId
	 * @param \Sellastica\Entity\Configuration|null $configuration
	 * @return \Sellastica\CatalogSupplier\Entity\CatalogFeedCollection
	 */
	public function findVisibleByCategoryId(
		int $categoryId,
		\Sellastica\Entity\Configuration $configuration = null
	): \Sellastica\CatalogSupplier\Entity\CatalogFeedCollection
	{
		return $this->getEntitiesFromCacheOrStorage($this->mapper->findVisibleByCategoryId($categoryId, $configuration));
	}

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
		$data->stream = \Sellastica\CatalogSupplier\Model\Stream::from($data->stream);
		$data->compression = \Sellastica\CatalogSupplier\Model\Compression::from($data->compression);
		$data->feedFormat = \Sellastica\CatalogSupplier\Model\FeedFormat::from($data->feedFormat);
		$data->defaultCurrency = \Sellastica\Localization\Model\Currency::from($data->defaultCurrency);
		$data->defaultCountry = \Sellastica\Localization\Model\Country::from($data->defaultCountry);
		if ($data->secondCurrency) {
			$data->secondCurrency = \Sellastica\Localization\Model\Currency::from($data->secondCurrency);
		}

		return \Sellastica\CatalogSupplier\Entity\CatalogFeedBuilder::create(
			$data->supplierId,
			$data->url,
			$data->converterClass,
			$data->defaultCurrency,
			$data->defaultCountry
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