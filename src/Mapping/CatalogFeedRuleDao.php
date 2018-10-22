<?php
namespace Sellastica\CatalogSupplier\Mapping;

/**
 * @see \Sellastica\CatalogSupplier\Entity\CatalogFeedRule
 * @property CatalogFeedRuleDibiMapper $mapper
 */
class CatalogFeedRuleDao extends \Sellastica\Entity\Mapping\Dao
{
	/**
	 * @inheritDoc
	 */
	protected function getBuilder(
		$data,
		$first = null,
		$second = null
	): \Sellastica\Entity\IBuilder
	{
		$data->element = \Suppliers\Model\Rule\RuleElement::from($data->element);
		return \Sellastica\CatalogSupplier\Entity\CatalogFeedRuleBuilder::create($data->element, $data->type, $data->value)
			->hydrate($data);
	}

	/**
	 * @return \Sellastica\CatalogSupplier\Entity\CatalogFeedRuleCollection
	 */
	public function getEmptyCollection(): \Sellastica\Entity\Entity\EntityCollection
	{
		return new \Sellastica\CatalogSupplier\Entity\CatalogFeedRuleCollection;
	}
}