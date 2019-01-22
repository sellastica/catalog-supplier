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
	 * @return int|false
	 */
	public function getProductsSumCount(
		\DateTime $date,
		int $projectId
	)
	{
		return $this->getResource()
			->select(false)
			->select('SUM(productsCount)')
			->where('projectId = %i', $projectId)
			->where('date = %d', $date)
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