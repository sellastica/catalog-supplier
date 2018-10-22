<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\IBuilder;
use Sellastica\Entity\TBuilder;

/**
 * @see CatalogFeedRule
 */
class CatalogFeedRuleBuilder implements IBuilder
{
	use TBuilder;

	/** @var \Suppliers\Model\Rule\RuleElement */
	private $element;
	/** @var string */
	private $type;
	/** @var string */
	private $value;

	/**
	 * @param \Suppliers\Model\Rule\RuleElement $element
	 * @param string $type
	 * @param string $value
	 */
	public function __construct(
		\Suppliers\Model\Rule\RuleElement $element,
		string $type,
		string $value
	)
	{
		$this->element = $element;
		$this->type = $type;
		$this->value = $value;
	}

	/**
	 * @return \Suppliers\Model\Rule\RuleElement
	 */
	public function getElement(): \Suppliers\Model\Rule\RuleElement
	{
		return $this->element;
	}

	/**
	 * @return string
	 */
	public function getType(): string
	{
		return $this->type;
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
	public function generateId(): bool
	{
		return !CatalogFeedRule::isIdGeneratedByStorage();
	}

	/**
	 * @return CatalogFeedRule
	 */
	public function build(): CatalogFeedRule
	{
		return new CatalogFeedRule($this);
	}

	/**
	 * @param \Suppliers\Model\Rule\RuleElement $element
	 * @param string $type
	 * @param string $value
	 * @return self
	 */
	public static function create(
		\Suppliers\Model\Rule\RuleElement $element,
		string $type,
		string $value
	): self
	{
		return new self($element, $type, $value);
	}
}