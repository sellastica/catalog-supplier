<?php
namespace Sellastica\CatalogSupplier\Entity;

class ProjectFeedLogRelations implements \Sellastica\Entity\Relation\IEntityRelations
{
	/** @var ProjectFeedLog */
	private $projectFeedLog;
	/** @var \Sellastica\Project\Service\ProjectService */
	private $projectService;
	/** @var \Sellastica\CatalogSupplier\Service\CatalogFeedService */
	private $catalogFeedService;


	/**
	 * @param ProjectFeedLog $projectFeedLog
	 * @param \Sellastica\Project\Service\ProjectService $projectService
	 * @param \Sellastica\CatalogSupplier\Service\CatalogFeedService $catalogFeedService
	 */
	public function __construct(
		ProjectFeedLog $projectFeedLog,
		\Sellastica\Project\Service\ProjectService $projectService,
		\Sellastica\CatalogSupplier\Service\CatalogFeedService $catalogFeedService
	)
	{
		$this->projectFeedLog = $projectFeedLog;
		$this->projectService = $projectService;
		$this->catalogFeedService = $catalogFeedService;
	}

	/**
	 * @return \Sellastica\Project\Entity\Project
	 */
	public function getProject(): \Sellastica\Project\Entity\Project
	{
		return $this->projectService->find($this->projectFeedLog->getProjectId());
	}

	/**
	 * @return CatalogFeed|null
	 */
	public function getCatalogFeed(): ?CatalogFeed
	{
		return $this->catalogFeedService->find($this->projectFeedLog->getCatalogFeedId());
	}
}