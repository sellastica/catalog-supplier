<?php
namespace Sellastica\CatalogSupplier\Service;

class ProjectFeedLogService
{
	/** @var \Sellastica\Entity\EntityManager */
	private $em;


	/**
	 * @param \Sellastica\Entity\EntityManager $em
	 */
	public function __construct(
		\Sellastica\Entity\EntityManager $em
	)
	{
		$this->em = $em;
	}

	/**
	 * @param int $id
	 * @return \Sellastica\CatalogSupplier\Entity\ProjectFeedLog|null
	 */
	public function find(int $id): ?\Sellastica\CatalogSupplier\Entity\ProjectFeedLog
	{
		return $this->em->getRepository(\Sellastica\CatalogSupplier\Entity\ProjectFeedLog::class)->find($id);
	}

	/**
	 * @param array $filter
	 * @param \Sellastica\Entity\Configuration|null $configuration
	 * @return \Sellastica\CatalogSupplier\Entity\ProjectFeedLogCollection|\Sellastica\CatalogSupplier\Entity\ProjectFeedLog[]
	 */
	public function findBy(
		array $filter,
		\Sellastica\Entity\Configuration $configuration = null
	): \Sellastica\CatalogSupplier\Entity\ProjectFeedLogCollection
	{
		return $this->em->getRepository(\Sellastica\CatalogSupplier\Entity\ProjectFeedLog::class)
			->findBy($filter, $configuration);
	}

	/**
	 * @param array $filter
	 * @param \Sellastica\Entity\Configuration|null $configuration
	 * @return null|\Sellastica\CatalogSupplier\Entity\ProjectFeedLog
	 */
	public function findOneBy(
		array $filter,
		\Sellastica\Entity\Configuration $configuration = null
	): ?\Sellastica\CatalogSupplier\Entity\ProjectFeedLog
	{
		return $this->em->getRepository(\Sellastica\CatalogSupplier\Entity\ProjectFeedLog::class)
			->findOneBy($filter, $configuration);
	}

	/**
	 * @param \DateTime $date
	 * @param \Sellastica\Project\Entity\Project $project
	 * @param bool $nonTrialOnly
	 * @return int|null
	 */
	public function getProductsSumCount(
		\DateTime $date,
		\Sellastica\Project\Entity\Project $project,
		bool $nonTrialOnly = false
	): ?int
	{
		return $this->em->getRepository(\Sellastica\CatalogSupplier\Entity\ProjectFeedLog::class)
			->getProductsSumCount($date, $project->getId(), $nonTrialOnly);
	}

	/**
	 * @param array $dates
	 * @param \Sellastica\Project\Entity\Project $project
	 * @return array
	 */
	public function getProductsSumCountByDates(
		array $dates,
		\Sellastica\Project\Entity\Project $project
	): array
	{
		return $this->em->getRepository(\Sellastica\CatalogSupplier\Entity\ProjectFeedLog::class)
			->getProductsSumCountByDates($dates, $project->getId());
	}

	/**
	 * @param int $projectId
	 * @return \DateTime|null
	 */
	public function findLastUpdateTimestamp(int $projectId): ?\DateTime
	{
		return $this->em->getRepository(\Sellastica\CatalogSupplier\Entity\ProjectFeedLog::class)
			->findLastUpdateTimestamp($projectId);
	}

	/**
	 * @param \Sellastica\Project\Entity\Project $project
	 * @param \Sellastica\CatalogSupplier\Entity\CatalogFeed $catalogFeed
	 * @param \DateTime|null $date
	 * @return \Sellastica\CatalogSupplier\Entity\ProjectFeedLog
	 */
	public function create(
		\Sellastica\Project\Entity\Project $project,
		\Sellastica\CatalogSupplier\Entity\CatalogFeed $catalogFeed,
		\DateTime $date = null
	): \Sellastica\CatalogSupplier\Entity\ProjectFeedLog
	{
		$projectFeedLog = \Sellastica\CatalogSupplier\Entity\ProjectFeedLogBuilder::create(
			$project->getId(),
			$catalogFeed->getId(),
			$date ?? (new \DateTime())
		)->build();
		$this->em->persist($projectFeedLog);

		return $projectFeedLog;
	}

	/**
	 * @param \Sellastica\CatalogSupplier\Entity\ProjectFeedLog $projectFeedLog
	 */
	public function remove(\Sellastica\CatalogSupplier\Entity\ProjectFeedLog $projectFeedLog): void
	{
		$this->em->remove($projectFeedLog);
	}
}