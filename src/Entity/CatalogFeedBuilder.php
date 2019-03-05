<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\IBuilder;
use Sellastica\Entity\TBuilder;

/**
 * @see CatalogFeed
 */
class CatalogFeedBuilder implements IBuilder
{
	use TBuilder;

	/** @var int */
	private $supplierId;
	/** @var string|null */
	private $url;
	/** @var string */
	private $converterClass;
	/** @var \Sellastica\Localization\Model\Currency */
	private $defaultCurrency;
	/** @var \Sellastica\Localization\Model\Country */
	private $defaultCountry;
	/** @var string|null */
	private $title;
	/** @var bool */
	private $updateOnly = false;
	/** @var int|null */
	private $parentId;
	/** @var \Sellastica\CatalogSupplier\Model\FeedFormat */
	private $feedFormat;
	/** @var \Sellastica\CatalogSupplier\Model\Compression */
	private $compression;
	/** @var string|null */
	private $uncompressedFilename;
	/** @var string|null */
	private $domain;
	/** @var string|null */
	private $itemXPath;
	/** @var string|null */
	private $secondaryXPath;
	/** @var \Sellastica\Localization\Model\Currency|null */
	private $secondCurrency;
	/** @var string|null */
	private $schemaFilename;
	/** @var string|null */
	private $csvDelimiter;
	/** @var int|null */
	private $csvHeaderOffset = 0;
	/** @var string|null */
	private $login;
	/** @var string|null */
	private $password;
	/** @var int */
	private $timeout = 180;
	/** @var bool */
	private $supportsHead = true;
	/** @var \Sellastica\CatalogSupplier\Model\Stream */
	private $stream;
	/** @var bool */
	private $customUrl = true;
	/** @var bool */
	private $demo = false;
	/** @var string */
	private $authentication = 'none';
	/** @var bool */
	private $hasUniqueIdentifier = true;
	/** @var bool */
	private $visible = true;
	/** @var string|null */
	private $overrideScheme;
	/** @var string|null */
	private $crontab;
	/** @var bool */
	private $saveSourceData = true;
	/** @var bool */
	private $groupProductsWhenCounting = false;
	/** @var bool */
	private $hideMissingProducts = true;
	/** @var \Sellastica\Price\Price|null */
	private $priceCzk;
	/** @var \Sellastica\Price\Price|null */
	private $priceEur;

	/**
	 * @param int $supplierId
	 * @param string|null $url
	 * @param string $converterClass
	 * @param \Sellastica\Localization\Model\Currency $defaultCurrency
	 * @param \Sellastica\Localization\Model\Country $defaultCountry
	 */
	public function __construct(
		int $supplierId,
		string $url = null,
		string $converterClass,
		\Sellastica\Localization\Model\Currency $defaultCurrency,
		\Sellastica\Localization\Model\Country $defaultCountry
	)
	{
		$this->supplierId = $supplierId;
		$this->url = $url;
		$this->converterClass = $converterClass;
		$this->defaultCurrency = $defaultCurrency;
		$this->defaultCountry = $defaultCountry;
	}

	/**
	 * @return int
	 */
	public function getSupplierId(): int
	{
		return $this->supplierId;
	}

	/**
	 * @return string|null
	 */
	public function getUrl()
	{
		return $this->url;
	}

	/**
	 * @return string
	 */
	public function getConverterClass(): string
	{
		return $this->converterClass;
	}

	/**
	 * @return \Sellastica\Localization\Model\Currency
	 */
	public function getDefaultCurrency(): \Sellastica\Localization\Model\Currency
	{
		return $this->defaultCurrency;
	}

	/**
	 * @return \Sellastica\Localization\Model\Country
	 */
	public function getDefaultCountry(): \Sellastica\Localization\Model\Country
	{
		return $this->defaultCountry;
	}

	/**
	 * @return string|null
	 */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * @param string|null $title
	 * @return $this
	 */
	public function title(string $title = null)
	{
		$this->title = $title;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function getUpdateOnly(): bool
	{
		return $this->updateOnly;
	}

	/**
	 * @param bool $updateOnly
	 * @return $this
	 */
	public function updateOnly(bool $updateOnly)
	{
		$this->updateOnly = $updateOnly;
		return $this;
	}

	/**
	 * @return int|null
	 */
	public function getParentId()
	{
		return $this->parentId;
	}

	/**
	 * @param int|null $parentId
	 * @return $this
	 */
	public function parentId(int $parentId = null)
	{
		$this->parentId = $parentId;
		return $this;
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
	 * @return $this
	 */
	public function feedFormat(\Sellastica\CatalogSupplier\Model\FeedFormat $feedFormat)
	{
		$this->feedFormat = $feedFormat;
		return $this;
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
	 * @return $this
	 */
	public function compression(\Sellastica\CatalogSupplier\Model\Compression $compression)
	{
		$this->compression = $compression;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getUncompressedFilename()
	{
		return $this->uncompressedFilename;
	}

	/**
	 * @param string|null $uncompressedFilename
	 * @return $this
	 */
	public function uncompressedFilename(string $uncompressedFilename = null)
	{
		$this->uncompressedFilename = $uncompressedFilename;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getDomain()
	{
		return $this->domain;
	}

	/**
	 * @param string|null $domain
	 * @return $this
	 */
	public function domain(string $domain = null)
	{
		$this->domain = $domain;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getItemXPath()
	{
		return $this->itemXPath;
	}

	/**
	 * @param string|null $itemXPath
	 * @return $this
	 */
	public function itemXPath(string $itemXPath = null)
	{
		$this->itemXPath = $itemXPath;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getSecondaryXPath()
	{
		return $this->secondaryXPath;
	}

	/**
	 * @param string|null $secondaryXPath
	 * @return $this
	 */
	public function secondaryXPath(string $secondaryXPath = null)
	{
		$this->secondaryXPath = $secondaryXPath;
		return $this;
	}

	/**
	 * @return \Sellastica\Localization\Model\Currency|null
	 */
	public function getSecondCurrency()
	{
		return $this->secondCurrency;
	}

	/**
	 * @param \Sellastica\Localization\Model\Currency|null $secondCurrency
	 * @return $this
	 */
	public function secondCurrency(\Sellastica\Localization\Model\Currency $secondCurrency = null)
	{
		$this->secondCurrency = $secondCurrency;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getSchemaFilename()
	{
		return $this->schemaFilename;
	}

	/**
	 * @param string|null $schemaFilename
	 * @return $this
	 */
	public function schemaFilename(string $schemaFilename = null)
	{
		$this->schemaFilename = $schemaFilename;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getCsvDelimiter()
	{
		return $this->csvDelimiter;
	}

	/**
	 * @param string|null $csvDelimiter
	 * @return $this
	 */
	public function csvDelimiter(string $csvDelimiter = null)
	{
		$this->csvDelimiter = $csvDelimiter;
		return $this;
	}

	/**
	 * @return int|null
	 */
	public function getCsvHeaderOffset()
	{
		return $this->csvHeaderOffset;
	}

	/**
	 * @param int|null $csvHeaderOffset
	 * @return $this
	 */
	public function csvHeaderOffset(int $csvHeaderOffset = null)
	{
		$this->csvHeaderOffset = $csvHeaderOffset;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getLogin()
	{
		return $this->login;
	}

	/**
	 * @param string|null $login
	 * @return $this
	 */
	public function login(string $login = null)
	{
		$this->login = $login;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getPassword()
	{
		return $this->password;
	}

	/**
	 * @param string|null $password
	 * @return $this
	 */
	public function password(string $password = null)
	{
		$this->password = $password;
		return $this;
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
	 * @return $this
	 */
	public function timeout(int $timeout = 180)
	{
		$this->timeout = $timeout;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function getSupportsHead(): bool
	{
		return $this->supportsHead;
	}

	/**
	 * @param bool $supportsHead
	 * @return $this
	 */
	public function supportsHead(bool $supportsHead = true)
	{
		$this->supportsHead = $supportsHead;
		return $this;
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
	 * @return $this
	 */
	public function stream(\Sellastica\CatalogSupplier\Model\Stream $stream)
	{
		$this->stream = $stream;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function getCustomUrl(): bool
	{
		return $this->customUrl;
	}

	/**
	 * @param bool $customUrl
	 * @return $this
	 */
	public function customUrl(bool $customUrl = true)
	{
		$this->customUrl = $customUrl;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function getDemo(): bool
	{
		return $this->demo;
	}

	/**
	 * @param bool $demo
	 * @return $this
	 */
	public function demo(bool $demo)
	{
		$this->demo = $demo;
		return $this;
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
	 * @return $this
	 */
	public function authentication(string $authentication = 'none')
	{
		$this->authentication = $authentication;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function getHasUniqueIdentifier(): bool
	{
		return $this->hasUniqueIdentifier;
	}

	/**
	 * @param bool $hasUniqueIdentifier
	 * @return $this
	 */
	public function hasUniqueIdentifier(bool $hasUniqueIdentifier = true)
	{
		$this->hasUniqueIdentifier = $hasUniqueIdentifier;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function getVisible(): bool
	{
		return $this->visible;
	}

	/**
	 * @param bool $visible
	 * @return $this
	 */
	public function visible(bool $visible = true)
	{
		$this->visible = $visible;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getOverrideScheme()
	{
		return $this->overrideScheme;
	}

	/**
	 * @param string|null $overrideScheme
	 * @return $this
	 */
	public function overrideScheme(string $overrideScheme = null)
	{
		$this->overrideScheme = $overrideScheme;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getCrontab()
	{
		return $this->crontab;
	}

	/**
	 * @param string|null $crontab
	 * @return $this
	 */
	public function crontab(string $crontab = null)
	{
		$this->crontab = $crontab;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function getSaveSourceData(): bool
	{
		return $this->saveSourceData;
	}

	/**
	 * @param bool $saveSourceData
	 * @return $this
	 */
	public function saveSourceData(bool $saveSourceData = true)
	{
		$this->saveSourceData = $saveSourceData;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function getGroupProductsWhenCounting(): bool
	{
		return $this->groupProductsWhenCounting;
	}

	/**
	 * @param bool $groupProductsWhenCounting
	 * @return $this
	 */
	public function groupProductsWhenCounting(bool $groupProductsWhenCounting)
	{
		$this->groupProductsWhenCounting = $groupProductsWhenCounting;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function getHideMissingProducts(): bool
	{
		return $this->hideMissingProducts;
	}

	/**
	 * @param bool $hideMissingProducts
	 * @return $this
	 */
	public function hideMissingProducts(bool $hideMissingProducts = true)
	{
		$this->hideMissingProducts = $hideMissingProducts;
		return $this;
	}

	/**
	 * @return \Sellastica\Price\Price|null
	 */
	public function getPriceCzk()
	{
		return $this->priceCzk;
	}

	/**
	 * @param \Sellastica\Price\Price|null $priceCzk
	 * @return $this
	 */
	public function priceCzk(\Sellastica\Price\Price $priceCzk = null)
	{
		$this->priceCzk = $priceCzk;
		return $this;
	}

	/**
	 * @return \Sellastica\Price\Price|null
	 */
	public function getPriceEur()
	{
		return $this->priceEur;
	}

	/**
	 * @param \Sellastica\Price\Price|null $priceEur
	 * @return $this
	 */
	public function priceEur(\Sellastica\Price\Price $priceEur = null)
	{
		$this->priceEur = $priceEur;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function generateId(): bool
	{
		return !CatalogFeed::isIdGeneratedByStorage();
	}

	/**
	 * @return CatalogFeed
	 */
	public function build(): CatalogFeed
	{
		return new CatalogFeed($this);
	}

	/**
	 * @param int $supplierId
	 * @param string|null $url
	 * @param string $converterClass
	 * @param \Sellastica\Localization\Model\Currency $defaultCurrency
	 * @param \Sellastica\Localization\Model\Country $defaultCountry
	 * @return self
	 */
	public static function create(
		int $supplierId,
		string $url = null,
		string $converterClass,
		\Sellastica\Localization\Model\Currency $defaultCurrency,
		\Sellastica\Localization\Model\Country $defaultCountry
	): self
	{
		return new self($supplierId, $url, $converterClass, $defaultCurrency, $defaultCountry);
	}
}