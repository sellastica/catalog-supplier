<?php
namespace Sellastica\CatalogSupplier\Entity\B2bPartner\Presentation;

/**
 * {@inheritdoc}
 * @property \Sellastica\CatalogSupplier\Entity\B2bPartner\Entity\B2bPartner $parent
 */
class B2bPartnerProxy extends \Sellastica\Twig\Model\ProxyEntity
{
	/**
	 * @return int
	 */
	public function getId(): int
	{
		return $this->parent->getId();
	}

	/**
	 * @return string
	 */
	public function getFirst_name(): string
	{
		return $this->parent->getContact()->getFirstName();
	}

	/**
	 * @return string|null
	 */
	public function getLast_name(): ?string
	{
		return $this->parent->getContact()->getLastName();
	}

	/**
	 * @return string|null
	 */
	public function getFull_name(): ?string
	{
		return $this->parent->getContact()->getFullName();
	}

	/**
	 * @return string
	 */
	public function getEmail(): string
	{
		return $this->parent->getContact()->getEmail()->getEmail();
	}

	/**
	 * @return string
	 */
	public function getPhone(): string
	{
		return $this->parent->getContact()->getPhone();
	}

	/**
	 * @return null|string
	 */
	public function getCompany(): ?string
	{
		return $this->parent->getBillingAddress()
			? $this->parent->getBillingAddress()->getCompanyOrFullName()
			: null;
	}

	/**
	 * @return \Sellastica\Localization\Presentation\CurrencyProxy
	 */
	public function getCurrency(): \Sellastica\Localization\Presentation\CurrencyProxy
	{
		return $this->parent->getCurrency()->toProxy();
	}

	/**
	 * @return string
	 */
	public function getShortName(): string
	{
		return 'b2b_partner';
	}

	/**
	 * @return array
	 */
	public function getAllowedProperties(): array
	{
		return [
			'company',
			'currency',
			'first_name',
			'last_name',
			'full_name',
			'email',
			'phone',
			'id',
		];
	}
}