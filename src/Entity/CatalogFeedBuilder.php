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
	/** @var \Suppliers\Model\FeedType */
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
	/** @var string|null */
	private $xsd;
	/** @var bool */
	private $loginRequired = false;
	/** @var bool */
	private $passwordRequired = false;

	/**
	 * @param int $supplierId
	 * @param \Suppliers\Model\FeedType $type
	 * @param string $title
	 * @param string $url
	 * @param string $itemXPath
	 * @param string $converterClass
	 * @param \Sellastica\Localization\Model\Currency $defaultCurrency
	 */
	public function __construct(
		int $supplierId,
		\Suppliers\Model\FeedType $type,
		string $title,
		string $url,
		string $itemXPath,
		string $converterClass,
		\Sellastica\Localization\Model\Currency $defaultCurrency
	)
	{
		$this->supplierId = $supplierId;
		$this->type = $type;
		$this->title = $title;
		$this->url = $url;
		$this->itemXPath = $itemXPath;
		$this->converterClass = $converterClass;
		$this->defaultCurrency = $defaultCurrency;
	}

	/**
	 * @return int
	 */
	public function getSupplierId(): int
	{
		return $this->supplierId;
	}

	/**
	 * @return \Suppliers\Model\FeedType
	 */
	public function getType(): \Suppliers\Model\FeedType
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
	 * @param \Suppliers\Model\FeedType $type
	 * @param string $title
	 * @param string $url
	 * @param string $itemXPath
	 * @param string $converterClass
	 * @param \Sellastica\Localization\Model\Currency $defaultCurrency
	 * @return self
	 */
	public static function create(
		int $supplierId,
		\Suppliers\Model\FeedType $type,
		string $title,
		string $url,
		string $itemXPath,
		string $converterClass,
		\Sellastica\Localization\Model\Currency $defaultCurrency
	): self
	{
		return new self($supplierId, $type, $title, $url, $itemXPath, $converterClass, $defaultCurrency);
	}
}