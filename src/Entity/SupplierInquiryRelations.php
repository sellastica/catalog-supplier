<?php
namespace Sellastica\CatalogSupplier\Entity;

class SupplierInquiryRelations implements \Sellastica\Entity\Relation\IEntityRelations
{
	/** @var \Sellastica\Entity\EntityManager */
	private $em;
	/** @var SupplierInquiry */
	private $inquiry;


	/**
	 * @param SupplierInquiry $inquiry
	 * @param \Sellastica\Entity\EntityManager $em
	 */
	public function __construct(
		SupplierInquiry $inquiry,
		\Sellastica\Entity\EntityManager $em
	)
	{
		$this->em = $em;
		$this->inquiry = $inquiry;
	}

	/**
	 * @return \Sellastica\Project\Entity\Project|null
	 */
	public function getProject(): ?\Sellastica\Project\Entity\Project
	{
		return $this->em->getRepository(\Sellastica\Project\Entity\Project::class)->find($this->inquiry->getProjectId());
	}

	/**
	 * @return null|\Sellastica\Integroid\Entity\IntegroidUser
	 */
	public function getAdminUser(): ?\Sellastica\Integroid\Entity\IntegroidUser
	{
		return $this->em->getRepository(\Sellastica\Integroid\Entity\IntegroidUser::class)->find($this->inquiry->getAdminUserId());
	}

	/**
	 * @return null|\Sellastica\Helpdesk\Entity\Ticket
	 */
	public function getTicket(): ?\Sellastica\Helpdesk\Entity\Ticket
	{
		return $this->em->getRepository(\Sellastica\Helpdesk\Entity\Ticket::class)->find($this->inquiry->getTicketId());
	}

	/**
	 * @return \Sellastica\Crm\Entity\Invoice\Entity\Invoice|null
	 */
	public function getInvoice(): ?\Sellastica\Crm\Entity\Invoice\Entity\Invoice
	{
		return $this->em->getRepository(\Sellastica\Crm\Entity\Invoice\Entity\Invoice::class)->find($this->inquiry->getInvoiceId());
	}
}