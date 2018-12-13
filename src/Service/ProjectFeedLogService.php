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
	 * @return null|\Sellastica\CatalogSupplier\Entity\ProjectFeedLog
	 */
	public function findOneBy(array $filter): ?\Sellastica\CatalogSupplier\Entity\ProjectFeedLog
	{
		return $this->em->getRepository(\Sellastica\CatalogSupplier\Entity\ProjectFeedLog::class)->findOneBy($filter);
	}

	/**
	 * @param \Sellastica\Project\Entity\Project $project
	 * @param \Sellastica\CatalogSupplier\Entity\CatalogFeed $catalogFeed
	 * @return \Sellastica\CatalogSupplier\Entity\ProjectFeedLog|null
	 */
	public function findOneByProjectAndFeed(
		\Sellastica\Project\Entity\Project $project,
		\Sellastica\CatalogSupplier\Entity\CatalogFeed $catalogFeed
	): ?\Sellastica\CatalogSupplier\Entity\ProjectFeedLog
	{
		return $this->findOneBy([
			'projectId' => $project->getId(),
			'catalogFeedId' => $catalogFeed->getId(),
		]);
	}

	/**
	 * @param \Sellastica\Project\Entity\Project $project
	 * @param \Sellastica\CatalogSupplier\Entity\CatalogFeed $catalogFeed
	 * @param int $productsCount
	 * @param \DateTime|null $date
	 * @return \Sellastica\CatalogSupplier\Entity\ProjectFeedLog
	 */
	public function create(
		\Sellastica\Project\Entity\Project $project,
		\Sellastica\CatalogSupplier\Entity\CatalogFeed $catalogFeed,
		int $productsCount,
		\DateTime $date = null
	): \Sellastica\CatalogSupplier\Entity\ProjectFeedLog
	{
		$projectFeedLog = \Sellastica\CatalogSupplier\Entity\ProjectFeedLogBuilder::create(
			$project->getId(),
			$catalogFeed->getId(),
			$date ?? (new \DateTime()),
			$productsCount
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