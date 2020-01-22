<?php
namespace Sellastica\CatalogSupplier\Entity\Commission\Entity;

use Sellastica\Entity\IBuilder;
use Sellastica\Entity\Entity\IEntity;
use Sellastica\Entity\Entity\EntityFactory;

/**
 * @method Commission build(IBuilder $builder, bool $initialize = true, int $assignedId = null)
 * @see Commission
 */
class CommissionFactory extends EntityFactory
{
	/** @var \Sellastica\Crm\Entity\Invoice\Service\InvoiceService */
	private $invoiceService;


	/**
	 * @param \Sellastica\Entity\EntityManager $em
	 * @param \Sellastica\Entity\Event\IDomainEventPublisher $eventPublisher
	 * @param \Sellastica\Crm\Entity\Invoice\Service\InvoiceService $invoiceService
	 */
	public function __construct(
		\Sellastica\Entity\EntityManager $em,
		\Sellastica\Entity\Event\IDomainEventPublisher $eventPublisher,
		\Sellastica\Crm\Entity\Invoice\Service\InvoiceService $invoiceService
	)
	{
		parent::__construct($em, $eventPublisher);
		$this->invoiceService = $invoiceService;
	}

	/**
	 * @param IEntity|Commission $entity
	 */
	public function doInitialize(IEntity $entity)
	{
		$entity->setRelationService(new CommissionRelations($entity, $this->invoiceService));
	}

	/**
	 * @return string
	 */
	public function getEntityClass(): string
	{
		return Commission::class;
	}
}