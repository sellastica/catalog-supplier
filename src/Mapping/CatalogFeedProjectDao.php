<?php
namespace Sellastica\CatalogSupplier\Mapping;

/**
 * @see \Sellastica\CatalogSupplier\Entity\CatalogFeedProject
 * @property CatalogFeedProjectDibiMapper $mapper
 */
class CatalogFeedProjectDao extends \Sellastica\Entity\Mapping\Dao
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
		return \Sellastica\CatalogSupplier\Entity\CatalogFeedProjectBuilder::create(
			$data->projectId,
			$data->supplierId,
			$data->feedId,
			$data->productsCount
		)->hydrate($data);
	}

	/**
	 * @return \Sellastica\CatalogSupplier\Entity\CatalogFeedProjectCollection
	 */
	public function getEmptyCollection(): \Sellastica\Entity\Entity\EntityCollection
	{
		return new \Sellastica\CatalogSupplier\Entity\CatalogFeedProjectCollection;
	}
}