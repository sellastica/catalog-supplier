<?php
namespace Sellastica\CatalogSupplier\Mapping;

/**
 * @see \Sellastica\CatalogSupplier\Entity\ProjectFeed
 * @property ProjectFeedDibiMapper $mapper
 */
class ProjectFeedDao extends \Sellastica\Entity\Mapping\Dao
{
	/**
	 * @inheritDoc
	 */
	protected function getBuilder(
		$data,
		$first = null,
		$second = null
	): \Sellastica\Entity\IBuilder
	{
		if ($data->statistics) {
			$data->statistics = new \Suppliers\Entity\Feed\Model\FeedStatistics(
				\Nette\Utils\Json::decode($data->statistics, \Nette\Utils\Json::FORCE_ARRAY)
			);
		}

		return \Sellastica\CatalogSupplier\Entity\ProjectFeedBuilder::create(
			$data->projectId,
			$data->feedId,
			$data->catalogFeedId
		)->hydrate($data);
	}

	/**
	 * @return \Sellastica\CatalogSupplier\Entity\ProjectFeedCollection
	 */
	public function getEmptyCollection(): \Sellastica\Entity\Entity\EntityCollection
	{
		return new \Sellastica\CatalogSupplier\Entity\ProjectFeedCollection;
	}
}