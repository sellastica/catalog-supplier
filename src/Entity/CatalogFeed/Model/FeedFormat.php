<?php
namespace Sellastica\CatalogSupplier\Model;

class FeedFormat
{
	const XML = 'xml',
		CSV = 'csv',
		JSON = 'json';

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
	public function getValue(): string
	{
		return $this->value;
	}

	/**
	 * @return FeedFormat
	 */
	public static function xml(): FeedFormat
	{
		return new self(self::XML);
	}

	/**
	 * @return bool
	 */
	public function isXml(): bool
	{
		return $this->value === self::XML;
	}

	/**
	 * @return bool
	 */
	public function isCsv(): bool
	{
		return $this->value === self::CSV;
	}

	/**
	 * @return bool
	 */
	public function isJson(): bool
	{
		return $this->value === self::JSON;
	}

	/**
	 * @param string $format
	 * @return FeedFormat
	 */
	public static function from(string $format): FeedFormat
	{
		$rc = new \ReflectionClass(FeedFormat::class);
		if (!in_array($format, $rc->getConstants())) {
			throw new \InvalidArgumentException("Unknown feed format $format");
		}

		return new self($format);
	}
}
