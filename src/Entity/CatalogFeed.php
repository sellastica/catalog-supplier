<?php
namespace Sellastica\CatalogSupplier\Entity;

/**
 * @generate-builder
 * @see CatalogFeedBuilder
 *
 * @property CatalogFeedRelations $relationService
 */
class CatalogFeed extends \Sellastica\Entity\Entity\AbstractEntity
	implements \Sellastica\Entity\Entity\IEntity
{
	use \Sellastica\Entity\Entity\TAbstractEntity;

	const AUTH_NONE = 'none',
		AUTH_BASIC = 'basic',
		AUTH_NTLM = 'ntlm';

	/** @var int @required */
	private $supplierId;
	/** @var \Sellastica\CatalogSupplier\Model\FeedType @required */
	private $type;
	/** @var string @required */
	private $title;
	/** @var string @required */
	private $url;
	/** @var string @required */
	private $itemXPath;
	/** @var string @required */
	private $converterClass;
	/** @var \Sellastica\Localization\Model\Currency @required */
	private $defaultCurrency;
	/** @var \Sellastica\Localization\Model\Country @required */
	private $defaultCountry;
	/** @var \Sellastica\Localization\Model\Currency|null @optional */
	private $secondCurrency;
	/** @var string|null @optional */
	private $xsd;
	/** @var bool @optional */
	private $loginRequired = false;
	/** @var bool @optional */
	private $passwordRequired = false;
	/** @var string @optional */
	private $authentication = self::AUTH_NONE;


	/**
	 * @param CatalogFeedBuilder $builder
	 */
	public function __construct(CatalogFeedBuilder $builder)
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
	public function getSupplierId(): int
	{
		return $this->supplierId;
	}

	/**
	 * @param int $supplierId
	 */
	public function setSupplierId(int $supplierId): void
	{
		$this->supplierId = $supplierId;
	}

	/**
	 * @return CatalogSupplier
	 */
	public function getSupplier(): CatalogSupplier
	{
		return $this->relationService->getSupplier();
	}

	/**
	 * @return \Sellastica\CatalogSupplier\Model\FeedType
	 */
	public function getType(): \Sellastica\CatalogSupplier\Model\FeedType
	{
		return $this->type;
	}

	/**
	 * @param \Sellastica\CatalogSupplier\Model\FeedType $type
	 */
	public function setType(\Sellastica\CatalogSupplier\Model\FeedType $type): void
	{
		$this->type = $type;
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
	public function getUrl(): string
	{
		return $this->url;
	}

	/**
	 * @return string
	 */
	public function getItemXPath(): string
	{
		return $this->itemXPath;
	}

	/**
	 * @param string $itemXPath
	 */
	public function setItemXPath(string $itemXPath): void
	{
		$this->itemXPath = $itemXPath;
	}

	/**
	 * @return string
	 */
	public function getConverterClass(): string
	{
		return $this->converterClass;
	}

	/**
	 * @param string $converterClass
	 */
	public function setConverterClass(string $converterClass): void
	{
		$this->converterClass = $converterClass;
	}

	/**
	 * @return \Sellastica\Localization\Model\Currency
	 */
	public function getDefaultCurrency(): \Sellastica\Localization\Model\Currency
	{
		return $this->defaultCurrency;
	}

	/**
	 * @param \Sellastica\Localization\Model\Currency $defaultCurrency
	 */
	public function setDefaultCurrency(\Sellastica\Localization\Model\Currency $defaultCurrency): void
	{
		$this->defaultCurrency = $defaultCurrency;
	}

	/**
	 * @return \Sellastica\Localization\Model\Country
	 */
	public function getDefaultCountry(): \Sellastica\Localization\Model\Country
	{
		return $this->defaultCountry;
	}

	/**
	 * @param \Sellastica\Localization\Model\Country $defaultCountry
	 */
	public function setDefaultCountry(\Sellastica\Localization\Model\Country $defaultCountry): void
	{
		$this->defaultCountry = $defaultCountry;
	}

	/**
	 * @return null|\Sellastica\Localization\Model\Currency
	 */
	public function getSecondCurrency(): ?\Sellastica\Localization\Model\Currency
	{
		return $this->secondCurrency;
	}

	/**
	 * @param null|\Sellastica\Localization\Model\Currency $secondCurrency
	 */
	public function setSecondCurrency(?\Sellastica\Localization\Model\Currency $secondCurrency): void
	{
		$this->secondCurrency = $secondCurrency;
	}

	/**
	 * @return null|string
	 */
	public function getXsd(): ?string
	{
		return $this->xsd;
	}

	/**
	 * @param null|string $xsd
	 */
	public function setXsd(?string $xsd): void
	{
		$this->xsd = $xsd;
	}

	/**
	 * @return null|string
	 */
	public function getXsdPath(): ?string
	{
		return $this->xsd
			? $this->getSupplier()->getRelativeRootDirectory() . '/' . $this->xsd
			: null;
	}

	/**
	 * @return CatalogFeedUrlCollection
	 */
	public function getUrls(): CatalogFeedUrlCollection
	{
		return $this->relationService->getUrls();
	}

	/**
	 * @return bool
	 */
	public function isLoginRequired(): bool
	{
		return $this->loginRequired;
	}

	/**
	 * @param bool $loginRequired
	 */
	public function setLoginRequired(bool $loginRequired): void
	{
		$this->loginRequired = $loginRequired;
	}

	/**
	 * @return bool
	 */
	public function isPasswordRequired(): bool
	{
		return $this->passwordRequired;
	}

	/**
	 * @param bool $passwordRequired
	 */
	public function setPasswordRequired(bool $passwordRequired): void
	{
		$this->passwordRequired = $passwordRequired;
	}

	/**
	 * @return bool
	 */
	public function areCredentialsRequired(): bool
	{
		return $this->loginRequired || $this->passwordRequired;
	}

	/**
	 * @return string
	 */
	public function getAuthentication(): string
	{
		return $this->authentication;
	}

	/**
	 * @param string $authentication
	 */
	public function setAuthentication(string $authentication): void
	{
		$this->authentication = $authentication;
	}

	/**
	 * @return array
	 */
	public function toArray(): array
	{
		return array_merge(
			$this->parentToArray(),
			[
				'supplierId' => $this->supplierId,
				'type' => $this->type->getValue(),
				'title' => $this->title,
				'url' => $this->url,
				'itemXPath' => $this->itemXPath,
				'converterClass' => $this->converterClass,
				'defaultCurrency' => $this->defaultCurrency->getCode(),
				'defaultCountry' => $this->defaultCountry->getCode(),
				'secondCurrency' => $this->secondCurrency ? $this->secondCurrency->getCode() : null,
				'xsd' => $this->xsd,
				'loginRequired' => $this->loginRequired,
				'passwordRequired' => $this->passwordRequired,
				'authentication' => $this->authentication,
			]
		);
	}
}