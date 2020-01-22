<?php
namespace Sellastica\CatalogSupplier\Entity\B2bPartner\Entity;

use Sellastica\Entity\IBuilder;
use Sellastica\Entity\TBuilder;

/**
 * @see B2bPartner
 */
class B2bPartnerBuilder implements IBuilder
{
	use TBuilder;

	/** @var \Sellastica\Identity\Model\Contact */
	private $contact;
	/** @var \Sellastica\Localization\Model\Currency */
	private $currency;
	/** @var \Sellastica\Identity\Model\BillingAddress|null */
	private $billingAddress;
	/** @var float */
	private $commissionRatio = 0.2;

	/**
	 * @param \Sellastica\Identity\Model\Contact $contact
	 * @param \Sellastica\Localization\Model\Currency $currency
	 */
	public function __construct(
		\Sellastica\Identity\Model\Contact $contact,
		\Sellastica\Localization\Model\Currency $currency
	)
	{
		$this->contact = $contact;
		$this->currency = $currency;
	}

	/**
	 * @return \Sellastica\Identity\Model\Contact
	 */
	public function getContact(): \Sellastica\Identity\Model\Contact
	{
		return $this->contact;
	}

	/**
	 * @return \Sellastica\Localization\Model\Currency
	 */
	public function getCurrency(): \Sellastica\Localization\Model\Currency
	{
		return $this->currency;
	}

	/**
	 * @return \Sellastica\Identity\Model\BillingAddress|null
	 */
	public function getBillingAddress()
	{
		return $this->billingAddress;
	}

	/**
	 * @param \Sellastica\Identity\Model\BillingAddress|null $billingAddress
	 * @return $this
	 */
	public function billingAddress(\Sellastica\Identity\Model\BillingAddress $billingAddress = null)
	{
		$this->billingAddress = $billingAddress;
		return $this;
	}

	/**
	 * @return float
	 */
	public function getCommissionRatio(): float
	{
		return $this->commissionRatio;
	}

	/**
	 * @param float $commissionRatio
	 * @return $this
	 */
	public function commissionRatio(float $commissionRatio = 0.2)
	{
		$this->commissionRatio = $commissionRatio;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function generateId(): bool
	{
		return !B2bPartner::isIdGeneratedByStorage();
	}

	/**
	 * @return B2bPartner
	 */
	public function build(): B2bPartner
	{
		return new B2bPartner($this);
	}

	/**
	 * @param \Sellastica\Identity\Model\Contact $contact
	 * @param \Sellastica\Localization\Model\Currency $currency
	 * @return self
	 */
	public static function create(
		\Sellastica\Identity\Model\Contact $contact,
		\Sellastica\Localization\Model\Currency $currency
	): self
	{
		return new self($contact, $currency);
	}
}