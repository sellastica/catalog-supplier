<?php
namespace Sellastica\CatalogSupplier\Entity;

class SupplierOrderRelations implements \Sellastica\Entity\Relation\IEntityRelations
{
	/** @var \Sellastica\Entity\EntityManager */
	private $em;
	/** @var SupplierOrder */
	private $order;


	/**
	 * @param SupplierOrder $order
	 * @param \Sellastica\Entity\EntityManager $em
	 */
	public function __construct(
		SupplierOrder $order,
		\Sellastica\Entity\EntityManager $em
	)
	{
		$this->em = $em;
		$this->order = $order;
	}

	/**
	 * @return \Sellastica\Project\Entity\Project
	 */
	public function getProject(): \Sellastica\Project\Entity\Project
	{
		return $this->em->getRepository(\Sellastica\Project\Entity\Project::class)
			->find($this->order->getProjectId());
	}

	/**
	 * @return CatalogFeed|null
	 */
	public function getFeed(): ?CatalogFeed
	{
		return $this->em->getRepository(CatalogFeed::class)->find($this->order->getFeedId());
	}

	/**
	 * @return null|\Sellastica\Integroid\Entity\IntegroidUser
	 */
	public function getAdminUser(): ?\Sellastica\Integroid\Entity\IntegroidUser
	{
		return $this->em->getRepository(\Sellastica\Integroid\Entity\IntegroidUser::class)
			->find($this->order->getAdminUserId());
	}

	/**
	 * @return \Sellastica\Crm\Entity\Invoice\Entity\Invoice|null
	 */
	public function getInvoice(): ?\Sellastica\Crm\Entity\Invoice\Entity\Invoice
	{
		return $this->em->getRepository(\Sellastica\Crm\Entity\Invoice\Entity\Invoice::class)
			->find($this->order->getInvoiceId());
	}
}