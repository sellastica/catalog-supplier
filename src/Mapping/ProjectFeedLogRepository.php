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
	 * @return int|null
	 */
	public function getProductsSumCount(
		\DateTime $date,
		int $projectId
	): ?int
	{
		return $this->dao->getProductsSumCount($date, $projectId);
	}
}