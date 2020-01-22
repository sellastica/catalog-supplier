<?php
namespace Sellastica\CatalogSupplier\Entity;

/**
 * @generate-builder
 * @see CatalogFeedRuleBuilder
 */
class CatalogFeedRule extends \Sellastica\Entity\Entity\AbstractEntity
	implements \Sellastica\Entity\Entity\IEntity
{
	use \Sellastica\Entity\Entity\TAbstractEntity;

	/** @var \Suppliers\Model\Rule\RuleElement @required */
	private $element;
	/** @var string @required */
	private $type;
	/** @var string|null @optional */
	private $value;


	/**
	 * @param CatalogFeedRuleBuilder $builder
	 */
	public function __construct(CatalogFeedRuleBuilder $builder)
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
	 * @return \Suppliers\Model\Rule\RuleElement
	 */
	public function getElement(): \Suppliers\Model\Rule\RuleElement
	{
		return $this->element;
	}

	/**
	 * @param \Suppliers\Model\Rule\RuleElement $element
	 */
	public function setElement(\Suppliers\Model\Rule\RuleElement $element): void
	{
		$this->element = $element;
	}

	/**
	 * @return string
	 */
	public function getType(): string
	{
		return $this->type;
	}

	/**
	 * @param string $type
	 */
	public function setType(string $type): void
	{
		$this->type = $type;
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
	 * @return array
	 */
	public function toArray(): array
	{
		return array_merge(
			$this->parentToArray(),
			[
				'element' => $this->element->getValue(),
				'type' => $this->type,
				'value' => $this->value,
			]
		);
	}
}