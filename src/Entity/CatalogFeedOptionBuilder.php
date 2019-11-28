<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\IBuilder;
use Sellastica\Entity\TBuilder;

/**
 * @see CatalogFeedOption
 */
class CatalogFeedOptionBuilder implements IBuilder
{
	use TBuilder;

	/** @var \Sellastica\CatalogSupplier\Model\FeedOptionType */
	private $type;
	/** @var string */
	private $code;
	/** @var string */
	private $title;
	/** @var string|null */
	private $value;
	/** @var int|null */
	private $priority;

	/**
	 * @param \Sellastica\CatalogSupplier\Model\FeedOptionType $type
	 * @param string $code
	 * @param string $title
	 * @param string|null $value
	 */
	public function __construct(
		\Sellastica\CatalogSupplier\Model\FeedOptionType $type,
		string $code,
		string $title,
		string $value = null
	)
	{
		$this->type = $type;
		$this->code = $code;
		$this->title = $title;
		$this->value = $value;
	}

	/**
	 * @return \Sellastica\CatalogSupplier\Model\FeedOptionType
	 */
	public function getType(): \Sellastica\CatalogSupplier\Model\FeedOptionType
	{
		return $this->type;
	}

	/**
	 * @return string
	 */
	public function getCode(): string
	{
		return $this->code;
	}

	/**
	 * @return string
	 */
	public function getTitle(): string
	{
		return $this->title;
	}

	/**
	 * @return string|null
	 */
	public function getValue()
	{
		return $this->value;
	}

	/**
	 * @return int|null
	 */
	public function getPriority()
	{
		return $this->priority;
	}

	/**
	 * @param int|null $priority
	 * @return $this
	 */
	public function priority(int $priority = null)
	{
		$this->priority = $priority;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function generateId(): bool
	{
		return !CatalogFeedOption::isIdGeneratedByStorage();
	}

	/**
	 * @return CatalogFeedOption
	 */
	public function build(): CatalogFeedOption
	{
		return new CatalogFeedOption($this);
	}

	/**
	 * @param \Sellastica\CatalogSupplier\Model\FeedOptionType $type
	 * @param string $code
	 * @param string $title
	 * @param string|null $value
	 * @return self
	 */
	public static function create(
		\Sellastica\CatalogSupplier\Model\FeedOptionType $type,
		string $code,
		string $title,
		string $value = null
	): self
	{
		return new self($type, $code, $title, $value);
	}
}