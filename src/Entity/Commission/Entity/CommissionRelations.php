<?php
namespace Sellastica\CatalogSupplier\Entity\Commission\Entity;

class CommissionRelations implements \Sellastica\Entity\Relation\IEntityRelations
{
	/** @var \Sellastica\CatalogSupplier\Entity\Commission\Entity\Commission */
	private $commission;
	/** @var \Sellastica\Crm\Entity\Invoice\Service\InvoiceService */
	private $invoiceService;


	/**
	 * @param \Sellastica\CatalogSupplier\Entity\Commission\Entity\Commission $commission
	 * @param \Sellastica\Crm\Entity\Invoice\Service\InvoiceService $invoiceService
	 */
	public function __construct(
		\Sellastica\CatalogSupplier\Entity\Commission\Entity\Commission $commission,
		\Sellastica\Crm\Entity\Invoice\Service\InvoiceService $invoiceService
	)
	{
		$this->commission = $commission;
		$this->invoiceService = $invoiceService;
	}

	/**
	 * @return \Sellastica\Crm\Entity\Invoice\Entity\Invoice
	 */
	public function getInvoice(): \Sellastica\Crm\Entity\Invoice\Entity\Invoice
	{
		return $this->invoiceService->find($this->commission->getInvoiceId());
	}
}