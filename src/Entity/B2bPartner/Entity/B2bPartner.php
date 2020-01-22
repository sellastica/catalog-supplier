<?php
namespace Sellastica\CatalogSupplier\Entity\B2bPartner\Entity;

/**
 * @generate-builder
 * @see B2bPartnerBuilder
 */
class B2bPartner extends \Sellastica\Entity\Entity\AbstractEntity
	implements \Sellastica\Entity\Entity\IEntity, \Sellastica\Twig\Model\IProxable
{
	use \Sellastica\Entity\Entity\TAbstractEntity;

	/** @var \Sellastica\Identity\Model\Contact @required */
	private $contact;
	/** @var \Sellastica\Identity\Model\Password|null @optional */
	protected $password;
	/** @var \Sellastica\Localization\Model\Currency @required */
	private $currency;
	/** @var \Sellastica\Identity\Model\BillingAddress|null @optional */
	private $billingAddress;
	/** @var float @optional */
	private $commissionRatio = 0.2;


	/**
	 * @param B2bPartnerBuilder $builder
	 */
	public function __construct(B2bPartnerBuilder $builder)
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
	 * @return \Sellastica\Identity\Model\Contact
	 */
	public function getContact(): \Sellastica\Identity\Model\Contact
	{
		return $this->contact;
	}

	/**
	 * @param \Sellastica\Identity\Model\Contact $contact
	 */
	public function setContact(\Sellastica\Identity\Model\Contact $contact): void
	{
		$this->contact = $contact;
	}

	/**
	 * @return \Sellastica\Identity\Model\Password|null
	 */
	public function getPassword(): ?\Sellastica\Identity\Model\Password
	{
		return $this->password;
	}

	public function hashPassword(): void
	{
		$this->password = new \Sellastica\Identity\Model\Password(
			\Nette\Security\Passwords::hash($this->password->getPassword())
		);
	}

	/**
	 * @param \Sellastica\Identity\Model\Password|null $password
	 */
	public function setPassword(?\Sellastica\Identity\Model\Password $password): void
	{
		$this->password = $password;
	}

	/**
	 * @return \Sellastica\Localization\Model\Currency
	 */
	public function getCurrency(): \Sellastica\Localization\Model\Currency
	{
		return $this->currency;
	}

	/**
	 * @param \Sellastica\Localization\Model\Currency $currency
	 */
	public function setCurrency(\Sellastica\Localization\Model\Currency $currency): void
	{
		$this->currency = $currency;
	}

	/**
	 * @return \Sellastica\Identity\Model\BillingAddress|null
	 */
	public function getBillingAddress(): ?\Sellastica\Identity\Model\BillingAddress
	{
		return $this->billingAddress;
	}

	/**
	 * @param \Sellastica\Identity\Model\BillingAddress|null $billingAddress
	 */
	public function setBillingAddress(?\Sellastica\Identity\Model\BillingAddress $billingAddress): void
	{
		$this->billingAddress = $billingAddress;
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
	 */
	public function setCommissionRatio(float $commissionRatio): void
	{
		$this->commissionRatio = $commissionRatio;
	}

	/**
	 * @return array
	 */
	public function toArray(): array
	{
		return array_merge(
			$this->parentToArray(),
			[
				'firstName' => $this->contact->getFirstName(),
				'lastName' => $this->contact->getLastName(),
				'email' => $this->contact->getEmail()->getEmail(),
				'password' => $this->password ? $this->password->getPassword() : null,
				'phone' => $this->contact->getPhone(),
				'currency' => $this->currency->getCode(),
				'commissionRatio' => $this->commissionRatio,
			],
			//billing address
			$this->billingAddress ? $this->billingAddress->toArray() : [
				'company' => null,
				'street' => null,
				'city' => null,
				'zip' => null,
				'countryCode' => null,
				'cin' => null,
				'tin' => null,
			]
		);
	}

	/**
	 * @return \Sellastica\CatalogSupplier\Entity\B2bPartner\Presentation\B2bPartnerProxy
	 */
	public function toProxy(): \Sellastica\CatalogSupplier\Entity\B2bPartner\Presentation\B2bPartnerProxy
	{
		return new \Sellastica\CatalogSupplier\Entity\B2bPartner\Presentation\B2bPartnerProxy($this);
	}
}