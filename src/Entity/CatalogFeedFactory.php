<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\Entity\EntityFactory;
use Sellastica\Entity\Entity\IEntity;
use Sellastica\Entity\IBuilder;

/**
 * @method CatalogFeed build(IBuilder $builder, bool $initialize = true, int $assignedId = null)
 * @see CatalogFeed
 */
class CatalogFeedFactory extends EntityFactory
{
	/** @var \Sellastica\CatalogSupplier\Service\CatalogFeedService */
	private $catalogFeedService;

	/**
	 * @param \Sellastica\Entity\EntityManager $em
	 * @param \Sellastica\Entity\Event\IDomainEventPublisher $eventPublisher
	 * @param \Sellastica\CatalogSupplier\Service\CatalogFeedService $catalogFeedService
	 */
	public function __construct(
		\Sellastica\Entity\EntityManager $em,
		\Sellastica\Entity\Event\IDomainEventPublisher $eventPublisher,
		\Sellastica\CatalogSupplier\Service\CatalogFeedService $catalogFeedService
	)
	{
		parent::__construct($em, $eventPublisher);
		$this->catalogFeedService = $catalogFeedService;
	}

	/**
	 * @param IEntity|CatalogFeed $entity
	 */
	public function doInitialize(IEntity $entity)
	{
		$entity->setRelationService(new CatalogFeedRelations($entity, $this->catalogFeedService, $this->em));
	}

	/**
	 * @return string
	 */
	public function getEntityClass(): string
	{
		return CatalogFeed::class;
	}
}