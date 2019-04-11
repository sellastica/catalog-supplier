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
			->select('SUM(productsCount)')
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
			->select('SUM(productsCount)')->as('productsCount')
			->select('SUM(hiddenProductsCount)')->as('hiddenProductsCount')
			->select('SUM(totalProductsCount)')->as('totalProductsCount')
			->where('projectId = %i', $projectId)
			->where('[date] IN (%sN)', $dates)
			->groupBy('[date]')
			->orderBy('[date]')
			->fetchAll();
	}

	/**
	 * @return bool
	 */
	protected function isInCrmDatabase(): bool
	{
		return true;
	}
}