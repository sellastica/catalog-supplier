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
	 * @param bool $nonTrialOnly
	 * @return int|null
	 */
	public function getProductsSumCount(
		\DateTime $date,
		int $projectId,
		bool $nonTrialOnly = false
	): ?int
	{
		$count = $this->mapper->getProductsSumCount($date, $projectId, $nonTrialOnly);
		return $count !== false ? (int)$count : null;
	}

	/**
	 * @param array $dates
	 * @param int $projectId
	 * @return array
	 */
	public function getProductsSumCountByDates(
		array $dates,
		int $projectId
	): array
	{
		return $this->mapper->getProductsSumCountByDates($dates, $projectId);
	}

	/**
	 * @param int $projectId
	 * @return \DateTime|null
	 */
	public function findLastUpdateTimestamp(int $projectId): ?\DateTime
	{
		return $this->mapper->findLastUpdateTimestamp($projectId);
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
		return \Sellastica\CatalogSupplier\Entity\ProjectFeedLogBuilder::create(
			$data->projectId,
			$data->catalogFeedId,
			$data->date
		)->hydrate($data);
	}

	/**
	 * @return \Sellastica\CatalogSupplier\Entity\ProjectFeedLogCollection
	 */
	public function getEmptyCollection(): \Sellastica\Entity\Entity\EntityCollection
	{
		return new \Sellastica\CatalogSupplier\Entity\ProjectFeedLogCollection;
	}
}