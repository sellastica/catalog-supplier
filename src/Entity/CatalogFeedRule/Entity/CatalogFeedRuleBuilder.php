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
	/** @var string|null */
	private $value;

	/**
	 * @param \Suppliers\Model\Rule\RuleElement $element
	 * @param string $type
	 */
	public function __construct(
		\Suppliers\Model\Rule\RuleElement $element,
		string $type
	)
	{
		$this->element = $element;
		$this->type = $type;
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
	 * @return string|null
	 */
	public function getValue()
	{
		return $this->value;
	}

	/**
	 * @param string|null $value
	 * @return $this
	 */
	public function value(string $value = null)
	{
		$this->value = $value;
		return $this;
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
	 * @return self
	 */
	public static function create(
		\Suppliers\Model\Rule\RuleElement $element,
		string $type
	): self
	{
		return new self($element, $type);
	}
}