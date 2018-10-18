<?php
namespace Sellastica\CatalogSupplier\Entity;

class CatalogFeedProjectRelations implements \Sellastica\Entity\Relation\IEntityRelations
{
	/** @var CatalogFeedProject */
	private $feedProject;
	/** @var \Sellastica\Entity\EntityManager */
	private $em;


	/**
	 * @param CatalogFeedProject $feedProject
	 * @param \Sellastica\Entity\EntityManager $em
	 */
	public function __construct(
		CatalogFeedProject $feedProject,
		\Sellastica\Entity\EntityManager $em
	)
	{
		$this->feedProject = $feedProject;
		$this->em = $em;
	}

	/**
	 * @return \Sellastica\Project\Entity\Project
	 */
	public function getProject(): \Sellastica\Project\Entity\Project
	{
		return $this->em->getRepository(\Sellastica\Project\Entity\Project::class)
			->find($this->feedProject->getProjectId());
	}

	/**
	 * @return CatalogSupplier
	 */
	public function getSupplier(): CatalogSupplier
	{
		return $this->em->getRepository(CatalogSupplier::class)->find($this->feedProject->getSupplierId());
	}

	/**
	 * @return CatalogFeed
	 */
	public function getFeed(): CatalogFeed
	{
		return $this->em->getRepository(CatalogFeed::class)->find($this->feedProject->getFeedId());
	}
}