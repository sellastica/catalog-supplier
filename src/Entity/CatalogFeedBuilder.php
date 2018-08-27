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
	/** @var \Suppliers\Model\Validator\DataType */
	private $dataType;
	/** @var \Sellastica\Localization\Model\Currency|null */
	private $secondCurrency;
	/** @var \Suppliers\Model\Validator\SchemaType */
	private $schemaType;
	/** @var string|null */
	private $schemaFilename;
	/** @var string|null */
	private $login;
	/** @var string|null */
	private $password;
	/** @var string */
	private $authentication = 'none';
	/** @var bool */
	private $visible = true;

	/**
	 * @param int $supplierId
	 * @param \Sellastica\CatalogSupplier\Model\FeedType $type
	 * @param string $title
	 * @param string $url
	 * @param string $itemXPath
	 * @param string $converterClass
	 * @param \Sellastica\Localization\Model\Currency $defaultCurrency
	 * @param \Sellastica\Localization\Model\Country $defaultCountry
	 * @param \Suppliers\Model\Validator\DataType $dataType
	 */
	public function __construct(
		int $supplierId,
		\Sellastica\CatalogSupplier\Model\FeedType $type,
		string $title,
		string $url,
		string $itemXPath,
		string $converterClass,
		\Sellastica\Localization\Model\Currency $defaultCurrency,
		\Sellastica\Localization\Model\Country $defaultCountry,
		\Suppliers\Model\Validator\DataType $dataType
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
		$this->dataType = $dataType;
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
	 * @return \Suppliers\Model\Validator\DataType
	 */
	public function getDataType(): \Suppliers\Model\Validator\DataType
	{
		return $this->dataType;
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
	 * @return \Suppliers\Model\Validator\SchemaType
	 */
	public function getSchemaType(): \Suppliers\Model\Validator\SchemaType
	{
		return $this->schemaType;
	}

	/**
	 * @param \Suppliers\Model\Validator\SchemaType $schemaType
	 * @return $this
	 */
	public function schemaType(\Suppliers\Model\Validator\SchemaType $schemaType)
	{
		$this->schemaType = $schemaType;
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
	 * @param \Suppliers\Model\Validator\DataType $dataType
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
		\Sellastica\Localization\Model\Country $defaultCountry,
		\Suppliers\Model\Validator\DataType $dataType
	): self
	{
		return new self($supplierId, $type, $title, $url, $itemXPath, $converterClass, $defaultCurrency, $defaultCountry, $dataType);
	}
}