<?php
namespace Sellastica\CatalogSupplier\Mapping;

use Sellastica\CatalogSupplier\Entity\IProjectFeedLogRepository;
use Sellastica\CatalogSupplier\Entity\ProjectFeedLog;
use Sellastica\Entity\Mapping\RepositoryProxy;

/**
 * @method ProjectFeedLogRepository getRepository()
 * @see ProjectFeedLog
 */
class ProjectFeedLogRepositoryProxy extends RepositoryProxy implements IProjectFeedLogRepository
{
	public function getProductsSumCount(
		\DateTime $date,
		int $projectId,
		bool $includeTrials = false
	): ?int
	{
		return $this->getRepository()->getProductsSumCount($date, $projectId, $includeTrials);
	}
}