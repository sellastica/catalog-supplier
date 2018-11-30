<?php
namespace Sellastica\CatalogSupplier\Service;

class ProjectFeedService
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
	 * @return \Sellastica\CatalogSupplier\Entity\ProjectFeed|null
	 */
	public function find(int $id): ?\Sellastica\CatalogSupplier\Entity\ProjectFeed
	{
		return $this->em->getRepository(\Sellastica\CatalogSupplier\Entity\ProjectFeed::class)->find($id);
	}

	/**
	 * @param array $filter
	 * @return null|\Sellastica\CatalogSupplier\Entity\ProjectFeed
	 */
	public function findOneBy(array $filter): ?\Sellastica\CatalogSupplier\Entity\ProjectFeed
	{
		return $this->em->getRepository(\Sellastica\CatalogSupplier\Entity\ProjectFeed::class)->findOneBy($filter);
	}

	/**
	 * @param \Sellastica\Project\Entity\Project $project
	 * @param \Suppliers\Entity\Feed\Entity\Feed $feed
	 * @return \Sellastica\CatalogSupplier\Entity\ProjectFeed|null
	 */
	public function findOneByProjectAndFeed(
		\Sellastica\Project\Entity\Project $project,
		\Suppliers\Entity\Feed\Entity\Feed $feed
	): ?\Sellastica\CatalogSupplier\Entity\ProjectFeed
	{
		return $this->findOneBy([
			'projectId' => $project->getId(),
			'feedId' => $feed->getId(),
			'catalogFeedId' => $feed->getCatalogFeed()->getId(),
		]);
	}

	/**
	 * @param \Sellastica\Project\Entity\Project $project
	 * @param \Suppliers\Entity\Feed\Entity\Feed $feed
	 * @return \Sellastica\CatalogSupplier\Entity\ProjectFeed
	 */
	public function getByProjectAndFeed(
		\Sellastica\Project\Entity\Project $project,
		\Suppliers\Entity\Feed\Entity\Feed $feed
	): \Sellastica\CatalogSupplier\Entity\ProjectFeed
	{
		if (!$projectFeed = $this->findOneByProjectAndFeed($project, $feed)) {
			$projectFeed = $this->create($project, $feed);
		}

		return $projectFeed;
	}

	/**
	 * @param \Sellastica\Project\Entity\Project $project
	 * @param \Suppliers\Entity\Feed\Entity\Feed $feed
	 * @return \Sellastica\CatalogSupplier\Entity\ProjectFeed
	 */
	public function create(
		\Sellastica\Project\Entity\Project $project,
		\Suppliers\Entity\Feed\Entity\Feed $feed
	): \Sellastica\CatalogSupplier\Entity\ProjectFeed
	{
		$projectFeed = \Sellastica\CatalogSupplier\Entity\ProjectFeedBuilder::create(
			$project->getId(),
			$feed->getId(),
			$feed->getCatalogFeed()->getId()
		)->build();
		$this->em->persist($projectFeed);

		return $projectFeed;
	}

	/**
	 * @param \Sellastica\CatalogSupplier\Entity\ProjectFeed $projectFeed
	 */
	public function remove(\Sellastica\CatalogSupplier\Entity\ProjectFeed $projectFeed): void
	{
		$this->em->remove($projectFeed);
	}
}