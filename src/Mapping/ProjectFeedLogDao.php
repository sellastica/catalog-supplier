<?php
namespace Sellastica\CatalogSupplier\Mapping;

/**
 * @see \Sellastica\CatalogSupplier\Entity\ProjectFeedLog
 * @property ProjectFeedLogDibiMapper $mapper
 */
class ProjectFeedLogDao extends \Sellastica\Entity\Mapping\Dao
{
	/**
	 * @param \DateTime $date
	 * @param int $projectId
	 * @return int|null
	 */
	public function getProductsSumCount(
		\DateTime $date,
		int $projectId
	): ?int
	{
		$count = $this->mapper->getProductsSumCount($date, $projectId);
		return $count !== false ? (int)$count : null;
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
		return \Sellastica\CatalogSupplier\Entity\ProjectFeedLogBuilder::create($data->projectId, $data->catalogFeedId, $data->date, $data->productsCount)
			->hydrate($data);
	}

	/**
	 * @return \Sellastica\CatalogSupplier\Entity\ProjectFeedLogCollection
	 */
	public function getEmptyCollection(): \Sellastica\Entity\Entity\EntityCollection
	{
		return new \Sellastica\CatalogSupplier\Entity\ProjectFeedLogCollection;
	}
}