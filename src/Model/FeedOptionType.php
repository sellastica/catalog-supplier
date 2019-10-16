<?php
namespace Sellastica\CatalogSupplier\Model;

class FeedOptionType
{
	const CHECKBOX = 'checkbox',
		TEXT = 'text';

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
	 * @return FeedOptionType
	 */
	public static function checkbox(): FeedOptionType
	{
		return new self(self::CHECKBOX);
	}

	/**
	 * @return bool
	 */
	public function isCheckbox(): bool
	{
		return $this->value === self::CHECKBOX;
	}

	/**
	 * @return bool
	 */
	public function isText(): bool
	{
		return $this->value === self::TEXT;
	}

	/**
	 * @param string $type
	 * @return FeedOptionType
	 */
	public static function from(string $type): FeedOptionType
	{
		$rc = new \ReflectionClass(FeedOptionType::class);
		if (!in_array($type, $rc->getConstants())) {
			throw new \InvalidArgumentException("Unknown feed option type $type");
		}

		return new self($type);
	}
}
