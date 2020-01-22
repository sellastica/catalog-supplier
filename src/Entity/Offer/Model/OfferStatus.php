<?php
namespace Sellastica\CatalogSupplier\Model;

class OfferStatus
{
	const NEW = 'new',
		ACCEPTED = 'accepted',
		REJECTED = 'rejected';

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
	public function isAccepted(): bool
	{
		return $this->value === self::ACCEPTED;
	}

	/**
	 * @return bool
	 */
	public function isRejected(): bool
	{
		return $this->value === self::REJECTED;
	}

	/**
	 * @param OfferStatus $status
	 * @return bool
	 */
	public function equals(OfferStatus $status): bool
	{
		return $this->value === $status->getValue();
	}

	/**
	 * @return OfferStatus
	 */
	public static function new(): OfferStatus
	{
		return new self(self::NEW);
	}

	/**
	 * @return OfferStatus
	 */
	public static function accepted(): OfferStatus
	{
		return new self(self::ACCEPTED);
	}

	/**
	 * @return OfferStatus
	 */
	public static function rejected(): OfferStatus
	{
		return new self(self::REJECTED);
	}

	/**
	 * @param string $status
	 * @return OfferStatus
	 * @throws \InvalidArgumentException
	 */
	public static function from(string $status): OfferStatus
	{
		$rc = new \ReflectionClass(OfferStatus::class);
		if (!in_array($status, $rc->getConstants())) {
			throw new \InvalidArgumentException("Unknown offer status $status");
		}

		return new self($status);
	}

	/**
	 * @return OfferStatus[]
	 */
	public static function getAll(): array
	{
		$rc = new \ReflectionClass(OfferStatus::class);
		$all = [];
		foreach ($rc->getConstants() as $status) {
			$all[] = self::from($status);
		}

		return $all;
	}
}
