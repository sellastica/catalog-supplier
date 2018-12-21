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
	 * @param \Sellastica\Entity\Configuration|null $configuration
	 * @return \Sellastica\CatalogSupplier\Entity\ProjectFeedCollection|\Sellastica\CatalogSupplier\Entity\ProjectFeed[]
	 */
	public function findBy(
		array $filter,
		\Sellastica\Entity\Configuration $configuration = null
	): \Sellastica\CatalogSupplier\Entity\ProjectFeedCollection
	{
		return $this->em->getRepository(\Sellastica\CatalogSupplier\Entity\ProjectFeed::class)
			->findBy($filter, $configuration);
	}

	/**
	 * @param int $projectId
	 * @param \Sellastica\Entity\Configuration|null $configuration
	 * @return \Sellastica\CatalogSupplier\Entity\ProjectFeedCollection|\Sellastica\CatalogSupplier\Entity\ProjectFeed[]
	 */
	public function findByProjectId(
		int $projectId,
		\Sellastica\Entity\Configuration $configuration = null
	): \Sellastica\CatalogSupplier\Entity\ProjectFeedCollection
	{
		return $this->em->getRepository(\Sellastica\CatalogSupplier\Entity\ProjectFeed::class)
			->findBy(['projectId' => $projectId], $configuration);
	}

	/**
	 * @param array $filter
	 * @param \Sellastica\Entity\Configuration|null $configuration
	 * @return null|\Sellastica\CatalogSupplier\Entity\ProjectFeed
	 */
	public function findOneBy(
		array $filter,
		\Sellastica\Entity\Configuration $configuration = null
	): ?\Sellastica\CatalogSupplier\Entity\ProjectFeed
	{
		return $this->em->getRepository(\Sellastica\CatalogSupplier\Entity\ProjectFeed::class)
			->findOneBy($filter, $configuration);
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