<?php
namespace Sellastica\CatalogSupplier\Model;

class FeedStatistics
{
	const TITLE = 'title',
		PEREX = 'perex',
		DESCRIPTION = 'description',
		MANUFACTURER = 'manufacturer',
		WARRANTY = 'warranty',
		CATEGORIES = 'categories',
		IMAGES = 'images',
		ATTACHMENTS = 'attachments',
		CUSTOM_FIELDS = 'customFields',
		RELATED_PRODUCTS = 'relatedProducts',
		ALTERNATIVE_PRODUCTS = 'alternativeProducts',
		CODE = 'code',
		PRICE = 'price',
		PURCHASE_PRICE = 'purchasePrice',
		NORMAL_MARKET_PRICE = 'normalMarketPrice',
		AVAILABILITY = 'availability',
		QUANTITY = 'quantity',
		EAN = 'ean',
		OPTIONS = 'options';

	/** @var array */
	public static $titles = [
		self::TITLE => 'apps.suppliers.statistics.title',
		self::PEREX => 'apps.suppliers.statistics.perex',
		self::DESCRIPTION => 'apps.suppliers.statistics.description',
		self::MANUFACTURER => 'apps.suppliers.statistics.manufacturer',
		self::WARRANTY => 'apps.suppliers.statistics.warranty',
		self::CATEGORIES => 'apps.suppliers.statistics.categories',
		self::IMAGES => 'apps.suppliers.statistics.images',
		self::ATTACHMENTS => 'apps.suppliers.statistics.attachments',
		self::CUSTOM_FIELDS => 'apps.suppliers.statistics.custom_fields',
		self::RELATED_PRODUCTS => 'apps.suppliers.statistics.related_products',
		self::ALTERNATIVE_PRODUCTS => 'apps.suppliers.statistics.alternative_products',
		self::CODE => 'apps.suppliers.statistics.code',
		self::PRICE => 'apps.suppliers.statistics.price',
		self::PURCHASE_PRICE => 'apps.suppliers.statistics.purchase_price',
		self::NORMAL_MARKET_PRICE => 'apps.suppliers.statistics.normal_market_price',
		self::AVAILABILITY => 'apps.suppliers.statistics.availability',
		self::QUANTITY => 'apps.suppliers.statistics.quantity',
		self::EAN => 'apps.suppliers.statistics.ean',
		self::OPTIONS => 'apps.suppliers.statistics.options',
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
			$this->add('title');
		}

		if ($productData->getDescription() !== null) {
			$this->add('description');
		}

		if ($productData->getPerex() !== null) {
			$this->add('perex');
		}

		if ($productData->getManufacturer() !== null) {
			$this->add('manufacturer');
		}

		if ($productData->getWarranty() !== null) {
			$this->add('warranty');
		}

		if ($productData->getCategories()) {
			$this->add('categories');
		}

		if ($productData->getImages()) {
			$this->add('images');
		}

		if ($productData->getAttachments()) {
			$this->add('attachments');
		}

		if ($productData->getParameters() || $productData->getFilters()) {
			$this->add('parameters');
		}

		if ($productData->getRelatedProductCodes() || $productData->getRelatedProductExternalIds()) {
			$this->add('relatedProducts');
		}

		if ($productData->getAlternativeProductCodes() || $productData->getAlternativeProductExternalIds()) {
			$this->add('alternativeProducts');
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
			$this->add('code');
		}

		if ($variantData->getPrice() !== null) {
			$this->add('price');
		}

		if ($variantData->getPurchasePrice() !== null) {
			$this->add('purchasePrice');
		}

		if ($variantData->getNormalMarketPrice() !== null) {
			$this->add('normalMarketPrice');
		}

		if ($variantData->getEan() !== null) {
			$this->add('ean');
		}

		if ($variantData->getAvailability()) {
			$this->add('availability');
			if ($variantData->getAvailability()->getQuantity() !== null) {
				$this->add('quantity');
			}
		}

		if ($variantData->getOptions()) {
			$this->add('options');
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