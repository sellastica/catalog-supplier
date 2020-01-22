<?php
namespace Sellastica\CatalogSupplier\Entity\Commission\Entity;

/**
 * @generate-builder
 * @see CommissionBuilder
 *
 * @property CommissionRelations $relationService
 */
class Commission extends \Sellastica\Entity\Entity\AbstractEntity
{
	use \Sellastica\Entity\Entity\TAbstractEntity;

	/** @var int @required */
	private $invoiceId;
	/** @var int @required */
	private $projectId;
	/** @var int @required */
	private $b2bProjectId;
	/** @var int @required */
	private $percentCommission;
	/** @var \Sellastica\Price\Price @required */
	private $commission;
	/** @var \DateTime|null @optional */
	private $commissionPaid;


	/**
	 * @param CommissionBuilder $builder
	 */
	public function __construct(CommissionBuilder $builder)
	{
		$this->hydrate($builder);
	}

	/**
	 * @return bool
	 */
	public static function isIdGeneratedByStorage(): bool
	{
		return true;
	}

	/**
	 * @return int
	 */
	public function getInvoiceId(): int
	{
		return $this->invoiceId;
	}

	/**
	 * @param int $invoiceId
	 */
	public function setInvoiceId(int $invoiceId): void
	{
		$this->invoiceId = $invoiceId;
	}

	/**
	 * @return \Sellastica\Crm\Entity\Invoice\Entity\Invoice
	 */
	public function getInvoice(): \Sellastica\Crm\Entity\Invoice\Entity\Invoice
	{
		return $this->relationService->getInvoice();
	}

	/**
	 * @return int
	 */
	public function getProjectId(): int
	{
		return $this->projectId;
	}

	/**
	 * @param int $projectId
	 */
	public function setProjectId(int $projectId): void
	{
		$this->projectId = $projectId;
	}

	/**
	 * @return int
	 */
	public function getB2bProjectId(): int
	{
		return $this->b2bProjectId;
	}

	/**
	 * @param int $b2bProjectId
	 */
	public function setB2bProjectId(int $b2bProjectId): void
	{
		$this->b2bProjectId = $b2bProjectId;
	}

	/**
	 * @return int
	 */
	public function getPercentCommission(): int
	{
		return $this->percentCommission;
	}

	/**
	 * @param int $percentCommission
	 */
	public function setPercentCommission(int $percentCommission): void
	{
		$this->percentCommission = $percentCommission;
	}

	/**
	 * @return \Sellastica\Price\Price
	 */
	public function getCommission(): \Sellastica\Price\Price
	{
		return $this->commission;
	}

	/**
	 * @param \Sellastica\Price\Price $commission
	 */
	public function setCommission(\Sellastica\Price\Price $commission): void
	{
		$this->commission = $commission;
	}

	/**
	 * @return \DateTime|null
	 */
	public function getCommissionPaid(): ?\DateTime
	{
		return $this->commissionPaid;
	}

	/**
	 * @param \DateTime|null $commissionPaid
	 */
	public function setCommissionPaid(?\DateTime $commissionPaid): void
	{
		$this->commissionPaid = $commissionPaid;
	}

	/**
	 * @return array
	 */
	public function toArray(): array
	{
		return array_merge(
			$this->parentToArray(),
			[
				'invoiceId' => $this->invoiceId,
				'projectId' => $this->projectId,
				'b2bProjectId' => $this->b2bProjectId,
				'percentCommission' => $this->percentCommission,
				'commission' => $this->commission->getWithoutTax(),
				'currency' => $this->commission->getCurrency()->getCode(),
				'vatRate' => $this->commission->getTaxRate(),
				'commissionPaid' => $this->commissionPaid,
			]
		);
	}
}