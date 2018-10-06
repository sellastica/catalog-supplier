<?php
namespace Sellastica\CatalogSupplier\Model;

class Stream
{
	const HTTP = 'http',
		CURL = 'curl';

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
	public function isHttp(): bool
	{
		return $this->value === self::HTTP;
	}

	/**
	 * @return bool
	 */
	public function isCurl(): bool
	{
		return $this->value === self::CURL;
	}

	/**
	 * @return Stream
	 */
	public static function http(): Stream
	{
		return new self(self::HTTP);
	}

	/**
	 * @param string $stream
	 * @return Stream
	 */
	public static function from(string $stream): Stream
	{
		$rc = new \ReflectionClass(Stream::class);
		if (!in_array($stream, $rc->getConstants())) {
			throw new \InvalidArgumentException("Unknown stream type $stream");
		}

		return new self($stream);
	}
}
