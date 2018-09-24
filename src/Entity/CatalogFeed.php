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
	private $schemaFilename;
	/** @var string|null @optional */
	private $login;
	/** @var string|null @optional */
	private $password;
	/** @var bool @optional */
	private $customUrl = false;
	/** @var bool @optional */
	private $demo = false;
	/** @var string @optional */
	private $authentication = self::AUTH_NONE;
	/** @var bool @optional */
	private $visible = true;


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
		return \Sellastica\Project\Utils\Helpers::getProjectTitle($this->getSupplier()->getHomepage());
	}

	/**
	 * @return string
	 */
	public function getUrl(): string
	{
		return $this->url;
	}

	/**
	 * @param string $url
	 */
	public function setUrl(string $url): void
	{
		$this->url = $url;
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
	public function getSchemaFilename(): ?string
	{
		return $this->schemaFilename;
	}

	/**
	 * @param null|string $schemaFilename
	 */
	public function setSchemaFilename(?string $schemaFilename): void
	{
		$this->schemaFilename = $schemaFilename;
	}

	/**
	 * @return null|string
	 */
	public function getSchemaPath(): ?string
	{
		return $this->schemaFilename
			? $this->getSupplier()->getRelativeRootDirectory() . '/' . $this->schemaFilename
			: null;
	}

	/**
	 * @return null|string
	 */
	public function getLogin(): ?string
	{
		return $this->login;
	}

	/**
	 * @param null|string $login
	 */
	public function setLogin(?string $login): void
	{
		$this->login = $login;
	}

	/**
	 * @return null|string
	 */
	public function getPassword(): ?string
	{
		return $this->password;
	}

	/**
	 * @param null|string $password
	 */
	public function setPassword(?string $password): void
	{
		$this->password = $password;
	}

	/**
	 * @return bool
	 */
	public function areCredentialsRequired(): bool
	{
		return $this->login || $this->password;
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
	 * @return bool
	 */
	public function isCustomUrl(): bool
	{
		return $this->customUrl;
	}

	/**
	 * @param bool $customUrl
	 */
	public function setCustomUrl(bool $customUrl): void
	{
		$this->customUrl = $customUrl;
	}

	/**
	 * @return bool
	 */
	public function isDemo(): bool
	{
		return $this->demo;
	}

	/**
	 * @param bool $demo
	 */
	public function setDemo(bool $demo): void
	{
		$this->demo = $demo;
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
				'url' => $this->url,
				'itemXPath' => $this->itemXPath,
				'converterClass' => $this->converterClass,
				'defaultCurrency' => $this->defaultCurrency->getCode(),
				'defaultCountry' => $this->defaultCountry->getCode(),
				'secondCurrency' => $this->secondCurrency ? $this->secondCurrency->getCode() : null,
				'schemaFilename' => $this->schemaFilename,
				'login' => $this->login,
				'password' => $this->password,
				'customUrl' => $this->customUrl,
				'demo' => $this->demo,
				'authentication' => $this->authentication,
				'visible' => $this->visible,
			]
		);
	}
}