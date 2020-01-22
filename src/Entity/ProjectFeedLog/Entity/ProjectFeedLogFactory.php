<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\Entity\EntityFactory;
use Sellastica\Entity\Entity\IEntity;
use Sellastica\Entity\IBuilder;

/**
 * @method \Sellastica\CatalogSupplier\Entity\ProjectFeedLog build(IBuilder $builder, bool $initialize = true, int $assignedId = null)
 * @see ProjectFeedLog
 */
class ProjectFeedLogFactory extends EntityFactory
{
	/** @var \Sellastica\Project\Service\ProjectService */
	private $projectService;
	/** @var \Sellastica\CatalogSupplier\Service\CatalogFeedService */
	private $catalogFeedService;


	/**
	 * @param \Sellastica\Entity\EntityManager $em
	 * @param \Sellastica\Entity\Event\IDomainEventPublisher $eventPublisher
	 * @param \Sellastica\Project\Service\ProjectService $projectService
	 * @param \Sellastica\CatalogSupplier\Service\CatalogFeedService $catalogFeedService
	 */
	public function __construct(
		\Sellastica\Entity\EntityManager $em,
		\Sellastica\Entity\Event\IDomainEventPublisher $eventPublisher,
		\Sellastica\Project\Service\ProjectService $projectService,
		\Sellastica\CatalogSupplier\Service\CatalogFeedService $catalogFeedService
	)
	{
		parent::__construct($em, $eventPublisher);
		$this->projectService = $projectService;
		$this->catalogFeedService = $catalogFeedService;
	}

	/**
	 * @param IEntity|\Sellastica\CatalogSupplier\Entity\ProjectFeedLog $entity
	 */
	public function doInitialize(IEntity $entity)
	{
		$entity->setRelationService(new ProjectFeedLogRelations(
			$entity,
			$this->projectService,
			$this->catalogFeedService
		));
	}

	/**
	 * @return string
	 */
	public function getEntityClass(): string
	{
		return \Sellastica\CatalogSupplier\Entity\ProjectFeedLog::class;
	}
}