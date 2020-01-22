<?php
namespace Sellastica\CatalogSupplier\Model;

class OrderStatus
{
	const NEW = 'new',
		PENDING = 'pending',
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
	public function isClosed(): bool
	{
		return $this->value === self::CLOSED;
	}

	/**
	 * @return bool
	 */
	public function isPending(): bool
	{
		return $this->value === self::PENDING;
	}

	/**
	 * @return bool
	 */
	public function isCancelled(): bool
	{
		return $this->value === self::CANCELLED;
	}

	/**
	 * @param OrderStatus $status
	 * @return bool
	 */
	public function equals(OrderStatus $status): bool
	{
		return $this->value === $status->getValue();
	}

	/**
	 * @return OrderStatus
	 */
	public static function new(): OrderStatus
	{
		return new self(self::NEW);
	}

	/**
	 * @return OrderStatus
	 */
	public static function pending(): OrderStatus
	{
		return new self(self::PENDING);
	}

	/**
	 * @return OrderStatus
	 */
	public static function closed(): OrderStatus
	{
		return new self(self::CLOSED);
	}

	/**
	 * @return OrderStatus
	 */
	public static function cancelled(): OrderStatus
	{
		return new self(self::CANCELLED);
	}

	/**
	 * @param string $status
	 * @return OrderStatus
	 * @throws \InvalidArgumentException
	 */
	public static function from(string $status): OrderStatus
	{
		$rc = new \ReflectionClass(OrderStatus::class);
		if (!in_array($status, $rc->getConstants())) {
			throw new \InvalidArgumentException("Unknown order status $status");
		}

		return new self($status);
	}

	/**
	 * @return OrderStatus[]
	 */
	public static function getAll(): array
	{
		$rc = new \ReflectionClass(OrderStatus::class);
		$all = [];
		foreach ($rc->getConstants() as $status) {
			$all[] = self::from($status);
		}

		return $all;
	}
}
