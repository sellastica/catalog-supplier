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
	/** @var \Sellastica\CatalogSupplier\Model\FeedType */
	private $type;
	/** @var string */
	private $title;
	/** @var string */
	private $url;
	/** @var string */
	private $itemXPath;
	/** @var string */
	private $converterClass;
	/** @var \Sellastica\Localization\Model\Currency */
	private $defaultCurrency;
	/** @var \Sellastica\Localization\Model\Country */
	private $defaultCountry;
	/** @var \Sellastica\Localization\Model\Currency|null */
	private $secondCurrency;
	/** @var string|null */
	private $xsd;
	/** @var bool */
	private $loginRequired = false;
	/** @var bool */
	private $passwordRequired = false;
	/** @var string */
	private $authentication = 'none';

	/**
	 * @param int $supplierId
	 * @param \Sellastica\CatalogSupplier\Model\FeedType $type
	 * @param string $title
	 * @param string $url
	 * @param string $itemXPath
	 * @param string $converterClass
	 * @param \Sellastica\Localization\Model\Currency $defaultCurrency
	 * @param \Sellastica\Localization\Model\Country $defaultCountry
	 */
	public function __construct(
		int $supplierId,
		\Sellastica\CatalogSupplier\Model\FeedType $type,
		string $title,
		string $url,
		string $itemXPath,
		string $converterClass,
		\Sellastica\Localization\Model\Currency $defaultCurrency,
		\Sellastica\Localization\Model\Country $defaultCountry
	)
	{
		$this->supplierId = $supplierId;
		$this->type = $type;
		$this->title = $title;
		$this->url = $url;
		$this->itemXPath = $itemXPath;
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
	 * @return \Sellastica\CatalogSupplier\Model\FeedType
	 */
	public function getType(): \Sellastica\CatalogSupplier\Model\FeedType
	{
		return $this->type;
	}

	/**
	 * @return string
	 */
	public function getTitle(): string
	{
		return $this->title;
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
	public function getXsd()
	{
		return $this->xsd;
	}

	/**
	 * @param string|null $xsd
	 * @return $this
	 */
	public function xsd(string $xsd = null)
	{
		$this->xsd = $xsd;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function getLoginRequired(): bool
	{
		return $this->loginRequired;
	}

	/**
	 * @param bool $loginRequired
	 * @return $this
	 */
	public function loginRequired(bool $loginRequired)
	{
		$this->loginRequired = $loginRequired;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function getPasswordRequired(): bool
	{
		return $this->passwordRequired;
	}

	/**
	 * @param bool $passwordRequired
	 * @return $this
	 */
	public function passwordRequired(bool $passwordRequired)
	{
		$this->passwordRequired = $passwordRequired;
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
	 * @param \Sellastica\CatalogSupplier\Model\FeedType $type
	 * @param string $title
	 * @param string $url
	 * @param string $itemXPath
	 * @param string $converterClass
	 * @param \Sellastica\Localization\Model\Currency $defaultCurrency
	 * @param \Sellastica\Localization\Model\Country $defaultCountry
	 * @return self
	 */
	public static function create(
		int $supplierId,
		\Sellastica\CatalogSupplier\Model\FeedType $type,
		string $title,
		string $url,
		string $itemXPath,
		string $converterClass,
		\Sellastica\Localization\Model\Currency $defaultCurrency,
		\Sellastica\Localization\Model\Country $defaultCountry
	): self
	{
		return new self($supplierId, $type, $title, $url, $itemXPath, $converterClass, $defaultCurrency, $defaultCountry);
	}
}