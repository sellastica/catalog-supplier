<?php
namespace Sellastica\CatalogSupplier\Mapping;

/**
 * @see \Sellastica\CatalogSupplier\Entity\ProjectFeedLog
 */
class ProjectFeedLogDibiMapper extends \Sellastica\Entity\Mapping\DibiMapper
{
	/**
	 * @param \DateTime $date
	 * @param int $projectId
	 * @param bool $includeTrials
	 * @return int
	 */
	public function getProductsSumCount(
		\DateTime $date,
		int $projectId,
		bool $includeTrials = false
	): int
	{
		$resource = $this->getResource()
			->select(false)
			->select('SUM(productsCount)')
			->where('projectId = %i', $projectId)
			->where('date = %d', $date);
		if (!$includeTrials) {
			$resource->where('trial = 0');
		}

		return (int)$resource->fetchSingle();
	}

	/**
	 * @return bool
	 */
	protected function isInCrmDatabase(): bool
	{
		return true;
	}
}