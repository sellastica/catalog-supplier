<?php
namespace Sellastica\CatalogSupplier\Model;

class FeedStatistics
{
	const TITLE = 'title',
		PEREX = 'perex',
		DESCRIPTION = 'description',
		MANUFACTURER = 'manufacturerId',
		WARRANTY = 'warrantyId',
		CATEGORIES = 'categories',
		ESHOP_CATEGORIES = 'eshopCategories',
		IMAGES = 'images',
		ATTACHMENTS = 'attachments',
		CUSTOM_FIELDS = 'customFields',
		RELATED_PRODUCTS = 'relatedProducts',
		ALTERNATIVE_PRODUCTS = 'alternativeProducts',
		CODE = 'code',
		PRICE = 'price',
		PURCHASE_PRICE = 'purchasePrice',
		NORMAL_MARKET_PRICE = 'normalMarketPrice',
		AVAILABILITY = 'availabilityId',
		QUANTITY = 'quantity',
		EAN = 'ean',
		OPTIONS = 'options';

	/** @var array */
	public static $titles = [
		self::TITLE => 'apps.suppliers.statistics.titles.title',
		self::PEREX => 'apps.suppliers.statistics.titles.perex',
		self::DESCRIPTION => 'apps.suppliers.statistics.titles.description',
		self::MANUFACTURER => 'apps.suppliers.statistics.titles.manufacturer',
		self::WARRANTY => 'apps.suppliers.statistics.titles.warranty',
		self::ESHOP_CATEGORIES => 'apps.suppliers.statistics.titles.eshop_categories',
		self::CATEGORIES => 'apps.suppliers.statistics.titles.categories',
		self::IMAGES => 'apps.suppliers.statistics.titles.images',
		self::ATTACHMENTS => 'apps.suppliers.statistics.titles.attachments',
		self::CUSTOM_FIELDS => 'apps.suppliers.statistics.titles.custom_fields',
		self::RELATED_PRODUCTS => 'apps.suppliers.statistics.titles.related_products',
		self::ALTERNATIVE_PRODUCTS => 'apps.suppliers.statistics.titles.alternative_products',
		self::CODE => 'apps.suppliers.statistics.titles.code',
		self::PRICE => 'apps.suppliers.statistics.titles.price',
		self::PURCHASE_PRICE => 'apps.suppliers.statistics.titles.purchase_price',
		self::NORMAL_MARKET_PRICE => 'apps.suppliers.statistics.titles.normal_market_price',
		self::AVAILABILITY => 'apps.suppliers.statistics.titles.availability',
		self::QUANTITY => 'apps.suppliers.statistics.titles.quantity',
		self::EAN => 'apps.suppliers.statistics.titles.ean',
		self::OPTIONS => 'apps.suppliers.statistics.titles.options',
	];
	/** @var array */
	public static $descriptions = [
		self::PRICE => 'apps.suppliers.statistics.descriptions.price',
		self::PURCHASE_PRICE => 'apps.suppliers.statistics.descriptions.purchase_price',
		self::NORMAL_MARKET_PRICE => 'apps.suppliers.statistics.descriptions.normal_market_price',
	];
	/** @var array */
	public static $weights = [
		self::TITLE => 1,
		self::PEREX => 0.5,
		self::DESCRIPTION => 1,
		self::MANUFACTURER => 0.5,
		self::WARRANTY => 0.1,
		self::CATEGORIES => 1,
		self::IMAGES => 1,
		self::ATTACHMENTS => 0.1,
		self::CUSTOM_FIELDS => 0.9,
		self::RELATED_PRODUCTS => 0.5,
		self::ALTERNATIVE_PRODUCTS => 0.1,
		self::CODE => 1,
		self::PRICE => 1,
		self::PURCHASE_PRICE => 0.7,
		self::NORMAL_MARKET_PRICE => 0.2,
		self::AVAILABILITY => 1,
		self::QUANTITY => 1,
		self::EAN => 1,
		self::OPTIONS => 0.5,
	];
	/** @var int */
	private $productsCount = 0;
	/** @var array */
	private $data = [];


	/**
	 * @param array $array
	 */
	public function __construct(array $array = null)
	{
		if (isset($array['productsCount'])) {
			$this->productsCount = $array['productsCount'];
		}

		if (isset($array['data'])) {
			$this->data = $array['data'];
		}
	}

	/**
	 * @param string $property
	 * @return string|null
	 */
	public function getTitle(string $property): ?string
	{
		return self::$titles[$property] ?? null;
	}

	/**
	 * @param string $property
	 * @return string|null
	 */
	public function getDescription(string $property): ?string
	{
		return self::$descriptions[$property] ?? null;
	}

	/**
	 * @return int
	 */
	public function getProductsCount(): int
	{
		return $this->productsCount;
	}

	public function increaseProductCount(): void
	{
		$this->productsCount++;
	}

	/**
	 * @param string $property
	 */
	public function add(string $property): void
	{
		if (!isset($this->data[$property])) {
			$this->data[$property] = 1;
		} else {
			$this->data[$property]++;
		}
	}

	/**
	 * @param string $property
	 * @return int
	 */
	public function getCount(string $property): int
	{
		return $this->data[$property] ?? 0;
	}

	/**
	 * @param string $property
	 * @param int $count
	 */
	public function setCount(string $property, int $count): void
	{
		$this->data[$property] = $count;
	}

	/**
	 * @param string $property
	 * @return int
	 */
	public function getMissingCount(string $property): int
	{
		return $this->productsCount - $this->getCount($property);
	}

	/**
	 * @param string $property
	 * @return int
	 */
	public function getPercent(string $property): int
	{
		if (!$this->productsCount) {
			return 0;
		} else {
			return round($this->getCount($property) / $this->productsCount * 100);
		}
	}

	/**
	 * @return array
	 */
	public function getData(): array
	{
		$data = [];
		foreach (self::$titles as $property => $title) {
			$data[$property] = $this->getCount($property);
		}

		arsort($data);
		return $data;
	}

	/**
	 * @return int
	 */
	public function getAveragePercentage(): int
	{
		$numerator = 0;
		$denominator = 0;
		foreach (self::$titles as $property => $title) {
			if (!isset(self::$weights[$property])) {
				continue;
			}

			$numerator += self::$weights[$property] * $this->getPercent($property);
			$denominator += self::$weights[$property];
		}

		return round($numerator / $denominator);
	}

	/**
	 * @param \Suppliers\Model\Importer\ProductData $productData
	 */
	public function fromProductData(
		\Suppliers\Model\Importer\ProductData $productData
	): void
	{
		if ($productData->getTitle() !== null) {
			$this->add(self::TITLE);
		}

		if ($productData->getDescription() !== null) {
			$this->add(self::DESCRIPTION);
		}

		if ($productData->getPerex() !== null) {
			$this->add(self::PEREX);
		}

		if ($productData->getManufacturer() !== null) {
			$this->add(self::MANUFACTURER);
		}

		if ($productData->getWarranty() !== null) {
			$this->add(self::WARRANTY);
		}

		if ($productData->getCategories()) {
			$this->add(self::CATEGORIES);
		}

		if ($productData->getImages()) {
			$this->add(self::IMAGES);
		}

		if ($productData->getAttachments()) {
			$this->add(self::ATTACHMENTS);
		}

		if ($productData->getParameters() || $productData->getFilters()) {
			$this->add('parameters');
		}

		if ($productData->getRelatedProductCodes() || $productData->getRelatedProductExternalIds()) {
			$this->add(self::RELATED_PRODUCTS);
		}

		if ($productData->getAlternativeProductCodes() || $productData->getAlternativeProductExternalIds()) {
			$this->add(self::ALTERNATIVE_PRODUCTS);
		}
	}

	/**
	 * @param \Suppliers\Model\Importer\VariantData $variantData
	 */
	public function fromVariantData(
		\Suppliers\Model\Importer\VariantData $variantData
	): void
	{
		if ($variantData->getCode() !== null) {
			$this->add(self::CODE);
		}

		if ($variantData->getPrice() !== null) {
			$this->add(self::PRICE);
		}

		if ($variantData->getPurchasePrice() !== null) {
			$this->add(self::PURCHASE_PRICE);
		}

		if ($variantData->getNormalMarketPrice() !== null) {
			$this->add(self::NORMAL_MARKET_PRICE);
		}

		if ($variantData->getEan() !== null) {
			$this->add(self::EAN);
		}

		if ($variantData->getAvailability()) {
			$this->add(self::AVAILABILITY);
			if ($variantData->getAvailability()->getQuantity() !== null) {
				$this->add(self::QUANTITY);
			}
		}

		if ($variantData->getOptions()) {
			$this->add(self::OPTIONS);
		}

		if ($variantData->getParameters() || $variantData->getFilters()) {
			$this->add('parameters');
		}
	}

	/**
	 * @return array
	 */
	public function toArray(): array
	{
		return [
			'productsCount' => $this->productsCount,
			'data' => $this->data,
		];
	}
}