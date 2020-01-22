<?php
namespace Sellastica\CatalogSupplier\Entity;

/**
 * @generate-builder
 * @see CatalogFeedOptionBuilder
 */
class CatalogFeedOption extends \Sellastica\Entity\Entity\AbstractEntity
	implements \Sellastica\Entity\Entity\IEntity
{
	use \Sellastica\Entity\Entity\TAbstractEntity;

	/** @var \Sellastica\CatalogSupplier\Model\FeedOptionType @required */
	private $type;
	/** @var string @required */
	private $code;
	/** @var string @required */
	private $title;
	/** @var string|null @required */
	private $value;
	/** @var int|null @optional */
	private $priority;


	/**
	 * @param CatalogFeedOptionBuilder $builder
	 */
	public function __construct(CatalogFeedOptionBuilder $builder)
	{
		$this->hydrate($builder);
	}

	/**
	 * @return bool
	 */
	public static function isIdGeneratedByStorage(): bool
	{
		return true;
	}

	/**
	 * @return \Sellastica\CatalogSupplier\Model\FeedOptionType
	 */
	public function getType(): \Sellastica\CatalogSupplier\Model\FeedOptionType
	{
		return $this->type;
	}

	/**
	 * @param \Sellastica\CatalogSupplier\Model\FeedOptionType $type
	 */
	public function setType(\Sellastica\CatalogSupplier\Model\FeedOptionType $type): void
	{
		$this->type = $type;
	}

	/**
	 * @return string
	 */
	public function getTitle(): string
	{
		return $this->title;
	}

	/**
	 * @return string
	 */
	public function getCode(): string
	{
		return $this->code;
	}

	/**
	 * @param string $code
	 */
	public function setCode(string $code): void
	{
		$this->code = $code;
	}

	/**
	 * @param string $title
	 */
	public function setTitle(string $title): void
	{
		$this->title = $title;
	}

	/**
	 * @return string|null
	 */
	public function getValue(): ?string
	{
		return $this->value;
	}

	/**
	 * @param string|null $value
	 */
	public function setValue(?string $value): void
	{
		$this->value = $value;
	}

	/**
	 * @return int|null
	 */
	public function getPriority(): ?int
	{
		return $this->priority;
	}

	/**
	 * @param int|null $priority
	 */
	public function setPriority(?int $priority): void
	{
		$this->priority = $priority;
	}

	/**
	 * @return array
	 */
	public function toArray(): array
	{
		return array_merge(
			$this->parentToArray(),
			[
				'type' => $this->type->getValue(),
				'code' => $this->code,
				'title' => $this->title,
				'value' => $this->value,
				'priority' => $this->priority,
			]
		);
	}
}