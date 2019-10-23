<?php
namespace Sellastica\CatalogSupplier\Mapping;

use Sellastica\CatalogSupplier\Entity\IProjectFeedLogRepository;
use Sellastica\CatalogSupplier\Entity\ProjectFeedLog;
use Sellastica\Entity\Mapping\Repository;

/**
 * @property \Sellastica\CatalogSupplier\Mapping\ProjectFeedLogDao $dao
 * @see ProjectFeedLog
 */
class ProjectFeedLogRepository extends Repository implements IProjectFeedLogRepository
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
		return $this->dao->getProductsSumCount($date, $projectId, $nonTrialOnly);
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
		return $this->dao->getProductsSumCountByDates($dates, $projectId);
	}

	/**
	 * @param int $projectId
	 * @return \DateTime|null
	 */
	public function findLastUpdateTimestamp(int $projectId): ?\DateTime
	{
		return $this->dao->findLastUpdateTimestamp($projectId);
	}
}