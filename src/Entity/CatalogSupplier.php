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
	private $logo;
	/** @var string|null @optional */
	private $company;
	/** @var \Sellastica\Identity\Model\Email|null @optional */
	private $email;
	/** @var string|null @optional */
	private $phone;
	/** @var bool @optional */
	private $visible = true;



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
		return 'www/applications/suppliers/assets/' . $this->getCode();
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
				'logo' => $this->logo,
				'company' => $this->company,
				'email' => $this->getEmail(),
				'phone' => $this->phone,
				'visible' => $this->visible,
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