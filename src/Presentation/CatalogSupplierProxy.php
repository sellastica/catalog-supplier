<?php
namespace Sellastica\CatalogSupplier\Presentation;

/**
 * {@inheritdoc}
 * @property \Sellastica\CatalogSupplier\Entity\CatalogSupplier $parent
 */
class CatalogSupplierProxy extends \Sellastica\Twig\Model\ProxyEntity
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
	public function getTitle(): string
	{
		return $this->parent->getTitle();
	}

	/**
	 * @return string
	 */
	public function getCode(): string
	{
		return $this->parent->getCode();
	}

	/**
	 * @return string
	 */
	public function getHomepage(): string 
	{
		return $this->parent->getHomepage()->getAbsoluteUrl();
	}

	/**
	 * @return null|string
	 */
	public function getCompany(): ?string
	{
		return $this->parent->getCompany();
	}

	/**
	 * @return null|string
	 */
	public function getLogo(): ?string
	{
		return $this->parent->getLogo();
	}

	/**
	 * @return null|string
	 */
	public function getEmail(): ?string
	{
		return $this->parent->getEmail();
	}

	/**
	 * @return null|string
	 */
	public function getPhone(): ?string
	{
		return $this->parent->getPhone();
	}


	/**
	 * @return string
	 */
	public function getShortName(): string
	{
		return 'catalog_supplier';
	}

	/**
	 * @return array
	 */
	public function getAllowedProperties(): array
	{
		return [
			'code',
			'company',
			'email',
			'homepage',
			'id',
			'logo',
			'title',
			'phone',
		];
	}
}