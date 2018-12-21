<?php
namespace Sellastica\CatalogSupplier\Entity;

class ProjectFeedRelations implements \Sellastica\Entity\Relation\IEntityRelations
{
	/** @var ProjectFeed */
	private $projectFeed;
	/** @var \Sellastica\Entity\EntityManager */
	private $em;


	/**
	 * @param ProjectFeed $projectFeed
	 * @param \Sellastica\Entity\EntityManager $em
	 */
	public function __construct(
		ProjectFeed $projectFeed,
		\Sellastica\Entity\EntityManager $em
	)
	{
		$this->projectFeed = $projectFeed;
		$this->em = $em;
	}

	/**
	 * @return \Sellastica\Project\Entity\Project
	 */
	public function getProject(): \Sellastica\Project\Entity\Project
	{
		return $this->em->getRepository(\Sellastica\Project\Entity\Project::class)
			->find($this->projectFeed->getProjectId());
	}

	/**
	 * @return CatalogFeed
	 */
	public function getCatalogFeed(): CatalogFeed
	{
		return $this->em->getRepository(CatalogFeed::class)->find($this->projectFeed->getCatalogFeedId());
	}
}