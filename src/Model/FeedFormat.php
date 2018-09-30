<?php
namespace Sellastica\CatalogSupplier\Model;

class FeedFormat
{
	const XML = 'xml',
		CSV = 'csv';

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
