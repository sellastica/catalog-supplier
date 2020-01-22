<?php
namespace Sellastica\CatalogSupplier\Model;

class Compression
{
	const NONE = 'none',
		ZIP = 'zip';

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
	 * @return bool
	 */
	public function isNone(): bool
	{
		return $this->value === self::NONE;
	}

	/**
	 * @return bool
	 */
	public function isZip(): bool
	{
		return $this->value === self::ZIP;
	}

	/**
	 * @return Compression
	 */
	public static function none(): Compression
	{
		return new self(self::NONE);
	}

	/**
	 * @param string $format
	 * @return Compression
	 */
	public static function from(string $format): Compression
	{
		$rc = new \ReflectionClass(Compression::class);
		if (!in_array($format, $rc->getConstants())) {
			throw new \InvalidArgumentException("Unknown compression format $format");
		}

		return new self($format);
	}
}
