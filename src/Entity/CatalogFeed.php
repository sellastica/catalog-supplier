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

	const ENCODING_UTF8 = 'utf-8',
		ENCODING_WINDOWS_1250 = 'windows-1250';

	/** @var int @required */
	private $supplierId;
	/** @var string|null @optional */
	private $title;
	/** @var bool @optional */
	private $updateOnly = false;
	/** @var int|null @optional */
	private $parentId;
	/** @var \Sellastica\CatalogSupplier\Model\FeedFormat @optional */
	private $feedFormat;
	/** @var \Sellastica\CatalogSupplier\Model\Compression @optional */
	private $compression;
	/** @var string|null @optional */
	private $uncompressedFilename;
	/** @var string|null @required */
	private $url;
	/** @var string|null @optional */
	private $domain;
	/** @var string|null @optional */
	private $itemXPath;
	/** @var string|null @optional */
	private $secondaryXPath;
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
	private $csvDelimiter;
	/** @var int|null @optional */
	private $csvHeaderOffset = 0;
	/** @var string|null @optional */
	private $login;
	/** @var string|null @optional */
	private $password;
	/** @var int @optional */
	private $timeout = 180;
	/** @var bool @optional */
	private $supportsHead = true;
	/** @var string|null @optional */
	private $customDownloader;
	/** @var string|null @optional */
	private $customImageDownloader;
	/** @var \Sellastica\CatalogSupplier\Model\Stream @optional */
	private $stream;
	/** @var bool @optional */
	private $customUrl = true;
	/** @var bool @optional */
	private $demo = false;
	/** @var string @optional */
	private $authentication = self::AUTH_NONE;
	/** @var bool @optional */
	private $hasUniqueIdentifier = true;
	/** @var bool @optional */
	private $visible = true;
	/** @var string|null @optional */
	private $overrideScheme;
	/** @var string|null @optional */
	private $crontab;
	/** @var bool @optional */
	private $saveSourceData = true;
	/** @var bool @optional */
	private $groupProductsWhenCounting = false;
	/** @var bool @optional */
	private $hideMissingProducts = true;
	/** @var \Sellastica\Price\Price|null @optional */
	private $priceCzk;
	/** @var \Sellastica\Price\Price|null @optional */
	private $priceEur;
	/** @var string @optional */
	private $encoding = self::ENCODING_UTF8;
	/** @var array @optional */
	private $modifiedProperties = [];


	/**
	 * @param CatalogFeedBuilder $builder
	 */
	public function __construct(CatalogFeedBuilder $builder)
	{
		$this->hydrate($builder);
		$this->feedFormat = $this->feedFormat ?? \Sellastica\CatalogSupplier\Model\FeedFormat::xml();
		$this->compression = $this->compression ?? \Sellastica\CatalogSupplier\Model\Compression::none();
		$this->stream = $this->stream ?? \Sellastica\CatalogSupplier\Model\Stream::http();
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
	 * @return bool
	 */
	public function isUpdateOnly(): bool
	{
		return $this->updateOnly;
	}

	/**
	 * @param bool $updateOnly
	 */
	public function setUpdateOnly(bool $updateOnly): void
	{
		$this->updateOnly = $updateOnly;
	}

	/**
	 * @return int|null
	 */
	public function getParentId(): ?int
	{
		return $this->parentId;
	}

	/**
	 * @param int|null $parentId
	 */
	public function setParentId(?int $parentId): void
	{
		$this->parentId = $parentId;
	}

	/**
	 * @return CatalogFeed|null
	 */
	public function getParent(): ?CatalogFeed
	{
		return $this->relationService->getParent();
	}

	/**
	 * @return bool
	 */
	public function isMainFeed(): bool
	{
		return !$this->parentId;
	}

	/**
	 * @return string|null
	 */
	public function getTitle(): ?string
	{
		return $this->title;
	}

	/**
	 * @return string|null
	 */
	public function getTitleOrTitleByHomepage(): ?string
	{
		if (isset($this->title)) {
			return $this->title;
		} elseif ($this->getSupplier()->getHomepage()) {
			return \Sellastica\Project\Utils\Helpers::getProjectTitle($this->getSupplier()->getHomepage());
		} else {
			return null;
		}
	}

	/**
	 * @return string|null
	 */
	public function getTitleByHomepage(): ?string
	{
		return \Sellastica\Project\Utils\Helpers::getProjectTitle($this->getSupplier()->getHomepage());
	}

	/**
	 * @param string|null $title
	 */
	public function setTitle(?string $title): void
	{
		$this->title = $title;
	}

	/**
	 * @return string|null
	 */
	public function getUrl(): ?string
	{
		return $this->url;
	}

	/**
	 * @param string|null $url
	 */
	public function setUrl(?string $url): void
	{
		$this->url = $url;
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
	 * @return null|string
	 */
	public function getItemXPath(): ?string
	{
		return $this->itemXPath;
	}

	/**
	 * @param null|string $itemXPath
	 */
	public function setItemXPath(?string $itemXPath): void
	{
		$this->itemXPath = $itemXPath;
	}

	/**
	 * @return null|string
	 */
	public function getSecondaryXPath(): ?string
	{
		return $this->secondaryXPath;
	}

	/**
	 * @param null|string $secondaryXPath
	 */
	public function setSecondaryXPath(?string $secondaryXPath): void
	{
		$this->secondaryXPath = $secondaryXPath;
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
	public function supportsHead(): bool
	{
		return $this->supportsHead;
	}

	/**
	 * @param bool $supportsHead
	 */
	public function setSupportsHead(bool $supportsHead): void
	{
		$this->supportsHead = $supportsHead;
	}

	/**
	 * @return \Sellastica\CatalogSupplier\Model\Stream
	 */
	public function getStream(): \Sellastica\CatalogSupplier\Model\Stream
	{
		return $this->stream;
	}

	/**
	 * @param \Sellastica\CatalogSupplier\Model\Stream $stream
	 */
	public function setStream(\Sellastica\CatalogSupplier\Model\Stream $stream): void
	{
		$this->stream = $stream;
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
	 * @return bool
	 */
	public function hasUniqueIdentifier(): bool
	{
		return $this->hasUniqueIdentifier;
	}

	/**
	 * @param bool $hasUniqueIdentifier
	 */
	public function setHasUniqueIdentifier(bool $hasUniqueIdentifier): void
	{
		$this->hasUniqueIdentifier = $hasUniqueIdentifier;
	}

	/**
	 * @return \Sellastica\CatalogSupplier\Model\FeedFormat
	 */
	public function getFeedFormat(): \Sellastica\CatalogSupplier\Model\FeedFormat
	{
		return $this->feedFormat;
	}

	/**
	 * @param \Sellastica\CatalogSupplier\Model\FeedFormat $feedFormat
	 */
	public function setFeedFormat(\Sellastica\CatalogSupplier\Model\FeedFormat $feedFormat): void
	{
		$this->feedFormat = $feedFormat;
	}

	/**
	 * @return \Sellastica\CatalogSupplier\Model\Compression
	 */
	public function getCompression(): \Sellastica\CatalogSupplier\Model\Compression
	{
		return $this->compression;
	}

	/**
	 * @param \Sellastica\CatalogSupplier\Model\Compression $compression
	 */
	public function setCompression(\Sellastica\CatalogSupplier\Model\Compression $compression): void
	{
		$this->compression = $compression;
	}

	/**
	 * @return null|string
	 */
	public function getUncompressedFilename(): ?string
	{
		return $this->uncompressedFilename;
	}

	/**
	 * @param null|string $uncompressedFilename
	 */
	public function setUncompressedFilename(?string $uncompressedFilename): void
	{
		$this->uncompressedFilename = $uncompressedFilename;
	}

	/**
	 * @return int
	 */
	public function getTimeout(): int
	{
		return $this->timeout;
	}

	/**
	 * @param int $timeout
	 */
	public function setTimeout(int $timeout): void
	{
		$this->timeout = $timeout;
	}

	/**
	 * @return null|string
	 */
	public function getOverrideScheme(): ?string
	{
		return $this->overrideScheme;
	}

	/**
	 * @param null|string $overrideScheme
	 */
	public function setOverrideScheme(?string $overrideScheme): void
	{
		$this->overrideScheme = $overrideScheme;
	}

	/**
	 * @return CatalogFeedRuleCollection|CatalogFeedRule[]
	 */
	public function getRules(): CatalogFeedRuleCollection
	{
		return $this->relationService->getRules();
	}

	/**
	 * @return null|string
	 */
	public function getCsvDelimiter(): ?string
	{
		return $this->csvDelimiter;
	}

	/**
	 * @param null|string $csvDelimiter
	 */
	public function setCsvDelimiter(?string $csvDelimiter): void
	{
		$this->csvDelimiter = $csvDelimiter;
	}

	/**
	 * @return string|null
	 */
	public function getCrontab(): ?string
	{
		return $this->crontab;
	}

	/**
	 * @param string|null $crontab
	 */
	public function setCrontab(?string $crontab): void
	{
		$this->crontab = $crontab;
	}

	/**
	 * @return bool
	 */
	public function isSaveSourceData(): bool
	{
		return $this->saveSourceData;
	}

	/**
	 * @param bool $saveSourceData
	 */
	public function setSaveSourceData(bool $saveSourceData): void
	{
		$this->saveSourceData = $saveSourceData;
	}

	/**
	 * @return bool
	 */
	public function isGroupProductsWhenCounting(): bool
	{
		return $this->groupProductsWhenCounting;
	}

	/**
	 * @param bool $groupProductsWhenCounting
	 */
	public function setGroupProductsWhenCounting(bool $groupProductsWhenCounting): void
	{
		$this->groupProductsWhenCounting = $groupProductsWhenCounting;
	}

	/**
	 * @return \Sellastica\Price\Price|null
	 */
	public function getPriceCzk(): ?\Sellastica\Price\Price
	{
		return $this->priceCzk;
	}

	/**
	 * @param \Sellastica\Price\Price|null $priceCzk
	 */
	public function setPriceCzk(?\Sellastica\Price\Price $priceCzk): void
	{
		$this->priceCzk = $priceCzk;
	}

	/**
	 * @return \Sellastica\Price\Price|null
	 */
	public function getPriceEur(): ?\Sellastica\Price\Price
	{
		return $this->priceEur;
	}

	/**
	 * @param \Sellastica\Price\Price|null $priceEur
	 */
	public function setPriceEur(?\Sellastica\Price\Price $priceEur): void
	{
		$this->priceEur = $priceEur;
	}

	/**
	 * @return bool
	 */
	public function hideMissingProducts(): bool
	{
		return $this->hideMissingProducts;
	}

	/**
	 * @param bool $hideMissingProducts
	 */
	public function setHideMissingProducts(bool $hideMissingProducts): void
	{
		$this->hideMissingProducts = $hideMissingProducts;
	}

	/**
	 * @return int|null
	 */
	public function getCsvHeaderOffset(): ?int
	{
		return $this->csvHeaderOffset;
	}

	/**
	 * @param int|null $csvHeaderOffset
	 */
	public function setCsvHeaderOffset(?int $csvHeaderOffset): void
	{
		$this->csvHeaderOffset = $csvHeaderOffset;
	}

	/**
	 * @return string|null
	 */
	public function getCustomDownloader(): ?string
	{
		return $this->customDownloader;
	}

	/**
	 * @param string|null $customDownloader
	 */
	public function setCustomDownloader(?string $customDownloader): void
	{
		$this->customDownloader = $customDownloader;
	}

	/**
	 * @return string|null
	 */
	public function getCustomImageDownloader(): ?string
	{
		return $this->customImageDownloader;
	}

	/**
	 * @param string|null $customImageDownloader
	 */
	public function setCustomImageDownloader(?string $customImageDownloader): void
	{
		$this->customImageDownloader = $customImageDownloader;
	}

	/**
	 * @return string
	 */
	public function getEncoding(): string
	{
		return $this->encoding;
	}

	/**
	 * @param string $encoding
	 */
	public function setEncoding(string $encoding): void
	{
		$this->encoding = $encoding;
	}

	/**
	 * @return array
	 */
	public function getModifiedProperties(): array
	{
		return $this->modifiedProperties;
	}

	/**
	 * @param array $modifiedProperties
	 */
	public function setModifiedProperties(array $modifiedProperties): void
	{
		$this->modifiedProperties = $modifiedProperties;
	}

	/**
	 * @param string $property
	 */
	public function addModifiedProperty(string $property): void
	{
		if (!in_array($property, $this->modifiedProperties)) {
			$this->modifiedProperties[] = $property;
		}
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
				'title' => $this->title,
				'updateOnly' => $this->updateOnly,
				'parentId' => $this->parentId,
				'url' => $this->url,
				'domain' => $this->domain,
				'itemXPath' => $this->itemXPath,
				'secondaryXPath' => $this->secondaryXPath,
				'converterClass' => $this->converterClass,
				'defaultCurrency' => $this->defaultCurrency->getCode(),
				'defaultCountry' => $this->defaultCountry->getCode(),
				'secondCurrency' => $this->secondCurrency ? $this->secondCurrency->getCode() : null,
				'schemaFilename' => $this->schemaFilename,
				'login' => $this->login,
				'password' => $this->password,
				'supportsHead' => $this->supportsHead,
				'customDownloader' => $this->customDownloader,
				'customImageDownloader' => $this->customImageDownloader,
				'stream' => $this->stream->getValue(),
				'customUrl' => $this->customUrl,
				'demo' => $this->demo,
				'authentication' => $this->authentication,
				'hasUniqueIdentifier' => $this->hasUniqueIdentifier,
				'visible' => $this->visible,
				'feedFormat' => $this->feedFormat->getValue(),
				'compression' => $this->compression->getValue(),
				'uncompressedFilename' => $this->uncompressedFilename,
				'timeout' => $this->timeout,
				'overrideScheme' => $this->overrideScheme,
				'csvDelimiter' => $this->csvDelimiter,
				'csvHeaderOffset' => $this->csvHeaderOffset,
				'crontab' => $this->crontab,
				'saveSourceData' => $this->saveSourceData,
				'groupProductsWhenCounting' => $this->groupProductsWhenCounting,
				'hideMissingProducts' => $this->hideMissingProducts,
				'priceCzk' => $this->priceCzk ? $this->priceCzk->getDefaultPrice() : null,
				'priceEur' => $this->priceEur ? $this->priceEur->getDefaultPrice() : null,
				'encoding' => $this->encoding,
				'modifiedProperties' => $this->modifiedProperties
					? \Nette\Utils\Json::encode($this->modifiedProperties)
					: null,
			]
		);
	}
}