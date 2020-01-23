<?php
namespace Sellastica\CatalogSupplier\Entity\Commission\Entity;

use Sellastica\Entity\IBuilder;
use Sellastica\Entity\TBuilder;

/**
 * @see Commission
 */
class CommissionBuilder implements IBuilder
{
	use TBuilder;

	/** @var int */
	private $invoiceId;
	/** @var int */
	private $projectId;
	/** @var int */
	private $b2bPartnerId;
	/** @var int */
	private $commissionRatio;
	/** @var \Sellastica\Price\Price */
	private $commission;
	/** @var \DateTime|null */
	private $commissionPaid;

	/**
	 * @param int $invoiceId
	 * @param int $projectId
	 * @param int $b2bPartnerId
	 * @param int $commissionRatio
	 * @param \Sellastica\Price\Price $commission
	 */
	public function __construct(
		int $invoiceId,
		int $projectId,
		int $b2bPartnerId,
		int $commissionRatio,
		\Sellastica\Price\Price $commission
	)
	{
		$this->invoiceId = $invoiceId;
		$this->projectId = $projectId;
		$this->b2bPartnerId = $b2bPartnerId;
		$this->commissionRatio = $commissionRatio;
		$this->commission = $commission;
	}

	/**
	 * @return int
	 */
	public function getInvoiceId(): int
	{
		return $this->invoiceId;
	}

	/**
	 * @return int
	 */
	public function getProjectId(): int
	{
		return $this->projectId;
	}

	/**
	 * @return int
	 */
	public function getB2bPartnerId(): int
	{
		return $this->b2bPartnerId;
	}

	/**
	 * @return int
	 */
	public function getCommissionRatio(): int
	{
		return $this->commissionRatio;
	}

	/**
	 * @return \Sellastica\Price\Price
	 */
	public function getCommission(): \Sellastica\Price\Price
	{
		return $this->commission;
	}

	/**
	 * @return \DateTime|null
	 */
	public function getCommissionPaid()
	{
		return $this->commissionPaid;
	}

	/**
	 * @param \DateTime|null $commissionPaid
	 * @return $this
	 */
	public function commissionPaid(\DateTime $commissionPaid = null)
	{
		$this->commissionPaid = $commissionPaid;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function generateId(): bool
	{
		return !Commission::isIdGeneratedByStorage();
	}

	/**
	 * @return Commission
	 */
	public function build(): Commission
	{
		return new Commission($this);
	}

	/**
	 * @param int $invoiceId
	 * @param int $projectId
	 * @param int $b2bPartnerId
	 * @param int $commissionRatio
	 * @param \Sellastica\Price\Price $commission
	 * @return self
	 */
	public static function create(
		int $invoiceId,
		int $projectId,
		int $b2bPartnerId,
		int $commissionRatio,
		\Sellastica\Price\Price $commission
	): self
	{
		return new self($invoiceId, $projectId, $b2bPartnerId, $commissionRatio, $commission);
	}
}