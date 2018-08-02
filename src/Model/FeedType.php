<?php
namespace Sellastica\CatalogSupplier\Model;

class FeedType
{
	const PRODUCTS = 'products',
		AVAILABILITY = 'availability';

	/** @var array */
	public static $titles = [
		self::PRODUCTS => 'apps.suppliers.feed_types.products',
		self::AVAILABILITY => 'apps.suppliers.feed_types.availability',
	];

	/** @var string */
	private $value;


	/**
	 * @param string $value
	 */
	private function __construct(string $value)
	{
		$this->value = $value;
	}

	/**
	 * @return string
	 */
	public function getTitle(): string
	{
		return self::$titles[$this->value];
	}

	/**
	 * @return string
	 */
	public function getValue(): string
	{
		return $this->value;
	}

	/**
	 * @param string $type
	 * @return FeedType
	 */
	public static function from(string $type): FeedType
	{
		$rc = new \ReflectionClass(FeedType::class);
		if (!in_array($type, $rc->getConstants())) {
			throw new \InvalidArgumentException("Unknown feed type $type");
		}

		return new self($type);
	}
}
