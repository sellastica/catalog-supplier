<?php
namespace Sellastica\CatalogSupplier\Mapping;

/**
 * @see \Sellastica\CatalogSupplier\Entity\CatalogFeedOption
 * @property CatalogFeedOptionDibiMapper $mapper
 */
class CatalogFeedOptionDao extends \Sellastica\Entity\Mapping\Dao
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
		$data->type = \Sellastica\CatalogSupplier\Model\FeedOptionType::from($data->type);
		return \Sellastica\CatalogSupplier\Entity\CatalogFeedOptionBuilder::create(
			$data->type,
			$data->code,
			$data->title,
			$data->value
		)->hydrate($data);
	}

	/**
	 * @return \Sellastica\CatalogSupplier\Entity\CatalogFeedOptionCollection
	 */
	public function getEmptyCollection(): \Sellastica\Entity\Entity\EntityCollection
	{
		return new \Sellastica\CatalogSupplier\Entity\CatalogFeedOptionCollection;
	}
}