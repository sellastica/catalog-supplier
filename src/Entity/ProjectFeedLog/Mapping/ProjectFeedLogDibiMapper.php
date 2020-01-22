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
	 * @param bool $nonTrialOnly
	 * @return int|false
	 */
	public function getProductsSumCount(
		\DateTime $date,
		int $projectId,
		bool $nonTrialOnly = false
	)
	{
		$resource =  $this->getResource()
			->select(false)
			->select('SUM(activeProductsCount)')
			->where('projectId = %i', $projectId)
			->where('date = %d', $date);

		if ($nonTrialOnly) {
			$resource->where('trial = 0');
		}

		return $resource->fetchSingle();
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
		return $this->getResource()
			->select(false)
			->select('[date]')
			->select('SUM(activeProductsCount)')->as('activeProductsCount')
			->select('SUM(pendingProductsCount)')->as('pendingProductsCount')
			->select('SUM(totalProductsCount)')->as('totalProductsCount')
			->where('projectId = %i', $projectId)
			->where('[date] IN (%sN)', $dates)
			->groupBy('[date]')
			->orderBy('[date]')
			->fetchAll();
	}

	/**
	 * @param int $projectId
	 * @return \DateTime|null
	 */
	public function findLastUpdateTimestamp(int $projectId): ?\DateTime
	{
		return $this->database->select('MAX([created])')
			->from($this->getTableName(true))
			->where('projectId = %i', $projectId)
			->fetchSingle();
	}

	/**
	 * @return bool
	 */
	protected function isInCrmDatabase(): bool
	{
		return true;
	}
}