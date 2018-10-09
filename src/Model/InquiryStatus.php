<?php
namespace Sellastica\CatalogSupplier\Model;

class InquiryStatus
{
	const NEW = 'new',
		CONFIRMED = 'confirmed',
		ACCOMPLISHED = 'accomplished',
		CLOSED = 'closed',
		CANCELLED = 'cancelled';

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
	 * @return string
	 */
	public function getTitle(): string
	{
		return ucfirst($this->value);
	}

	/**
	 * @return bool
	 */
	public function isNew(): bool
	{
		return $this->value === self::NEW;
	}

	/**
	 * @return bool
	 */
	public function isConfirmed(): bool
	{
		return $this->value === self::CONFIRMED;
	}

	/**
	 * @return bool
	 */
	public function isAccomplished(): bool
	{
		return $this->value === self::ACCOMPLISHED;
	}

	/**
	 * @return bool
	 */
	public function isClosed(): bool
	{
		return $this->value === self::CLOSED;
	}

	/**
	 * @return bool
	 */
	public function isCancelled(): bool
	{
		return $this->value === self::CANCELLED;
	}

	/**
	 * @param InquiryStatus $status
	 * @return bool
	 */
	public function equals(InquiryStatus $status): bool
	{
		return $this->value === $status->getValue();
	}

	/**
	 * @return InquiryStatus
	 */
	public static function new(): InquiryStatus
	{
		return new self(self::NEW);
	}

	/**
	 * @return InquiryStatus
	 */
	public static function confirmed(): InquiryStatus
	{
		return new self(self::CONFIRMED);
	}

	/**
	 * @return InquiryStatus
	 */
	public static function closed(): InquiryStatus
	{
		return new self(self::CLOSED);
	}

	/**
	 * @return InquiryStatus
	 */
	public static function cancelled(): InquiryStatus
	{
		return new self(self::CANCELLED);
	}

	/**
	 * @param string $format
	 * @return InquiryStatus
	 */
	public static function from(string $format): InquiryStatus
	{
		$rc = new \ReflectionClass(InquiryStatus::class);
		if (!in_array($format, $rc->getConstants())) {
			throw new \InvalidArgumentException("Unknown InquiryStatus format $format");
		}

		return new self($format);
	}

	/**
	 * @return InquiryStatus[]
	 */
	public static function getAll(): array
	{
		$rc = new \ReflectionClass(InquiryStatus::class);
		$all = [];
		foreach ($rc->getConstants() as $status) {
			$all[] = self::from($status);
		}

		return $all;
	}
}
