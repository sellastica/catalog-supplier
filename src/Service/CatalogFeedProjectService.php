<?php
namespace Sellastica\CatalogSupplier\Service;

class CatalogFeedProjectService
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
	 * @return null|\Sellastica\CatalogSupplier\Entity\CatalogFeedProject
	 */
	public function find(int $id): ?\Sellastica\CatalogSupplier\Entity\CatalogFeedProject
	{
		return $this->em->getRepository(\Sellastica\CatalogSupplier\Entity\CatalogFeedProject::class)->find($id);
	}

	/**
	 * @param \Sellastica\Entity\Configuration|null $configuration
	 * @return \Sellastica\CatalogSupplier\Entity\CatalogFeedProjectCollection|\Sellastica\CatalogSupplier\Entity\CatalogFeedProject[]
	 */
	public function findAll(
		\Sellastica\Entity\Configuration $configuration = null
	): \Sellastica\CatalogSupplier\Entity\CatalogFeedProjectCollection
	{
		return $this->em->getRepository(\Sellastica\CatalogSupplier\Entity\CatalogFeedProject::class)
			->findAll($configuration);
	}

	/**
	 * @param array $filter
	 * @param \Sellastica\Entity\Configuration|null $configuration
	 * @return \Sellastica\CatalogSupplier\Entity\CatalogFeedProjectCollection|\Sellastica\CatalogSupplier\Entity\CatalogFeedProject[]
	 */
	public function findBy(
		array $filter,
		\Sellastica\Entity\Configuration $configuration = null
	): \Sellastica\CatalogSupplier\Entity\CatalogFeedProjectCollection
	{
		return $this->em->getRepository(\Sellastica\CatalogSupplier\Entity\CatalogFeedProject::class)
			->findBy($filter, $configuration);
	}

	/**
	 * @param \Sellastica\Project\Entity\Project $project
	 * @param int $productCount
	 * @param bool $supplierDownload
	 * @return \Sellastica\CatalogSupplier\Entity\CatalogFeedProject
	 */
	public function create(
		\Sellastica\Project\Entity\Project $project,
		int $productCount,
		bool $supplierDownload
	): \Sellastica\CatalogSupplier\Entity\CatalogFeedProject
	{
		$feedProject = \Sellastica\CatalogSupplier\Entity\CatalogFeedProjectBuilder::create(
			$project->getId(),
			$productCount,
			$supplierDownload
		)->build();
		$this->em->persist($feedProject);

		return $feedProject;
	}
}