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
	 * @param int $projectId
	 * @param string $feedId
	 * @param int $catalogFeedId
	 * @return \Sellastica\CatalogSupplier\Entity\ProjectFeed|null
	 */
	public function findOneByProjectAndFeed(
		int $projectId,
		string $feedId,
		int $catalogFeedId
	): ?\Sellastica\CatalogSupplier\Entity\ProjectFeed
	{
		return $this->findOneBy([
			'projectId' => $projectId,
			'feedId' => $feedId,
			'catalogFeedId' => $catalogFeedId,
		]);
	}

	/**
	 * @param int $projectId
	 * @param string $feedId
	 * @param int $catalogFeedId
	 * @return \Sellastica\CatalogSupplier\Entity\ProjectFeed
	 */
	public function getByProjectAndFeed(
		int $projectId,
		string $feedId,
		int $catalogFeedId
	): \Sellastica\CatalogSupplier\Entity\ProjectFeed
	{
		if (!$projectFeed = $this->findOneByProjectAndFeed($projectId, $feedId, $catalogFeedId)) {
			$projectFeed = $this->create($projectId, $feedId, $catalogFeedId);
		}

		return $projectFeed;
	}

	/**
	 * @param int $projectId
	 * @param string $feedId
	 * @param int $catalogFeedId
	 * @return \Sellastica\CatalogSupplier\Entity\ProjectFeed
	 */
	public function create(
		int $projectId,
		string $feedId,
		int $catalogFeedId
	): \Sellastica\CatalogSupplier\Entity\ProjectFeed
	{
		$projectFeed = \Sellastica\CatalogSupplier\Entity\ProjectFeedBuilder::create(
			$projectId,
			$feedId,
			$catalogFeedId
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