<?php
namespace Sellastica\CatalogSupplier\Entity;

/**
 * @generate-builder
 * @see CatalogSupplierBuilder
 *
 * @property CatalogSupplierRelations $relationService
 */
class CatalogSupplier extends \Sellastica\Entity\Entity\AbstractEntity
	implements \Sellastica\Entity\Entity\IEntity, \Sellastica\Twig\Model\IProxable
{
	use \Sellastica\Entity\Entity\TAbstractEntity;

	/** @var string @required */
	private $title;
	/** @var string @required */
	private $code;
	/** @var \Nette\Http\Url|null @optional */
	private $homepage;
	/** @var string|null @optional */
	private $domain;
	/** @var string|null @optional */
	private $logo;
	/** @var string|null @optional */
	private $company;
	/** @var \Sellastica\Identity\Model\Email|null @optional */
	private $email;
	/** @var string|null @optional */
	private $phone;
	/** @var string|null @optional */
	private $description;
	/** @var bool @optional */
	private $visible = true;
	/** @var CatalogCategoryCollection|CatalogCategory[] */
	private $categories;
	/** @var \Sellastica\Identity\Model\BillingAddress|null @optional */
	private $billingAddress;


	/**
	 * @param CatalogSupplierBuilder $builder
	 */
	public function __construct(CatalogSupplierBuilder $builder)
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
	 * @return string
	 */
	public function getTitle(): string
	{
		return $this->title;
	}

	/**
	 * @param string $title
	 */
	public function setTitle(string $title): void
	{
		$this->title = $title;
	}

	/**
	 * @return string
	 */
	public function getCode(): string
	{
		return $this->code;
	}

	/**
	 * @param string $code
	 */
	public function setCode(string $code): void
	{
		$this->code = $code;
	}

	/**
	 * @return \Nette\Http\Url|null
	 */
	public function getHomepage(): ?\Nette\Http\Url
	{
		return $this->homepage;
	}

	/**
	 * @param \Nette\Http\Url|null $homepage
	 */
	public function setHomepage(?\Nette\Http\Url $homepage): void
	{
		$this->homepage = $homepage;
	}

	/**
	 * @return string|null
	 */
	public function getDomain(): ?string
	{
		return $this->domain;
	}

	/**
	 * @param string|null $domain
	 */
	public function setDomain(?string $domain): void
	{
		$this->domain = $domain;
	}

	/**
	 * @return CatalogFeedCollection|CatalogFeed[]
	 */
	public function getCatalogFeeds(): CatalogFeedCollection
	{
		return $this->relationService->getCatalogFeeds();
	}

	/**
	 * @return string
	 */
	public function getRelativeRootDirectory(): string
	{
		return 'app/model/Suppliers/Suppliers/' . $this->getCode();
	}

	/**
	 * @return string
	 */
	public function getRelativePublicDirectory(): string
	{
		return 'www/suppliers/assets/' . $this->getCode();
	}

	/**
	 * @return null|string
	 */
	public function getLogo(): ?string
	{
		return $this->logo;
	}

	/**
	 * @param null|string $logo
	 */
	public function setLogo(?string $logo): void
	{
		$this->logo = $logo;
	}

	/**
	 * @return null|string
	 */
	public function getLogoPath(): ?string
	{
		return $this->logo
			? $this->getRelativePublicDirectory() . '/' . $this->logo
			: null;
	}

	/**
	 * @return null|string
	 */
	public function getCompany(): ?string
	{
		return $this->company;
	}

	/**
	 * @param null|string $company
	 */
	public function setCompany(?string $company): void
	{
		$this->company = $company;
	}

	/**
	 * @param bool $object
	 * @return null|string|\Sellastica\Identity\Model\Email
	 */
	public function getEmail(bool $object = false)
	{
		if (!isset($this->email)) {
			return null;
		} else {
			return $object
				? $this->email
				: $this->email->getEmail();
		}
	}

	/**
	 * @param null|\Sellastica\Identity\Model\Email $email
	 */
	public function setEmail(?\Sellastica\Identity\Model\Email $email): void
	{
		$this->email = $email;
	}

	/**
	 * @return null|string
	 */
	public function getPhone(): ?string
	{
		return $this->phone;
	}

	/**
	 * @param null|string $phone
	 */
	public function setPhone(?string $phone): void
	{
		$this->phone = $phone;
	}

	/**
	 * @return bool
	 */
	public function isVisible(): bool
	{
		return $this->visible;
	}

	/**
	 * @param bool $visible
	 */
	public function setVisible(bool $visible): void
	{
		$this->visible = $visible;
	}

	/**
	 * @return null|string
	 */
	public function getDescription(): ?string
	{
		return $this->description;
	}

	/**
	 * @param null|string $description
	 */
	public function setDescription(?string $description): void
	{
		$this->description = $description;
	}

	/**
	 * @return bool
	 */
	public function areDataComplete(): bool
	{
		return $this->company
			&& $this->homepage
			&& $this->domain
			&& $this->description
			&& $this->billingAddress
			&& $this->billingAddress->getCin()
			&& $this->billingAddress->getStreet()
			&& $this->billingAddress->getCity()
			&& $this->billingAddress->getZip()
			&& $this->billingAddress->getCountry();
	}

	/**
	 * @return CatalogCategoryCollection|CatalogCategory[]
	 */
	public function getCategories(): CatalogCategoryCollection
	{
		$this->initializeCategories();
		return $this->categories;
	}

	/**
	 * @return array
	 */
	public function getCategoryIds(): array
	{
		$ids = [];
		foreach ($this->getCategories() as $category) {
			$ids[] = $category->getId();
		}

		return $ids;
	}

	private function initializeCategories(): void
	{
		if (!isset($this->categories)) {
			$this->categories = $this->relationService->getCategories();
		}
	}

	/**
	 * @param CatalogCategory $category
	 * @return bool
	 */
	public function isInCategories(CatalogCategory $category): bool
	{
		return in_array($category->getId(), $this->getCategoryIds());
	}

	/**
	 * @param CatalogCategory $category
	 */
	public function addCategory(CatalogCategory $category): void
	{
		if ($this->isInCategories($category)) {
			return;
		}

		$this->categories[] = $category;
		$this->eventPublisher->publish(new SupplierCategoryAdded($this, $category));
	}

	/**
	 * @param CatalogCategory $category
	 */
	public function removeCategory(CatalogCategory $category): void
	{
		if (!$this->isInCategories($category)) {
			return;
		}

		$this->categories[] = $category;
		$this->eventPublisher->publish(new SupplierCategoryRemoved($this, $category));
	}

	/**
	 * @return null|\Sellastica\Identity\Model\BillingAddress
	 */
	public function getBillingAddress(): ?\Sellastica\Identity\Model\BillingAddress
	{
		return $this->billingAddress;
	}

	/**
	 * @param null|\Sellastica\Identity\Model\BillingAddress $billingAddress
	 */
	public function setBillingAddress(?\Sellastica\Identity\Model\BillingAddress $billingAddress): void
	{
		$this->billingAddress = $billingAddress;
	}

	/**
	 * @return array
	 */
	public function toArray(): array
	{
		return array_merge(
			$this->parentToArray(),
			[
				'title' => $this->title,
				'code' => $this->code,
				'homepage' => $this->homepage
					? $this->homepage->getAbsoluteUrl()
					: null,
				'domain' => $this->domain,
				'logo' => $this->logo,
				'company' => $this->company,
				'email' => $this->getEmail(),
				'phone' => $this->phone,
				'description' => $this->description,
				'visible' => $this->visible,
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
	 * @return \Sellastica\CatalogSupplier\Presentation\CatalogSupplierProxy
	 */
	public function toProxy(): \Sellastica\CatalogSupplier\Presentation\CatalogSupplierProxy
	{
		return new \Sellastica\CatalogSupplier\Presentation\CatalogSupplierProxy($this);
	}
}