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
	 * @return bool
	 */
	protected function isInCrmDatabase(): bool
	{
		return true;
	}
}