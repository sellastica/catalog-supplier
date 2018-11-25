<?php
namespace Sellastica\CatalogSupplier\Mapping;

/**
 * @see \Sellastica\CatalogSupplier\Entity\CatalogCategory
 * @property CatalogCategoryDibiMapper $mapper
 */
class CatalogCategoryDao extends \Sellastica\Entity\Mapping\Dao
{
	/**
	 * @param int $supplierId
	 * @return \Sellastica\CatalogSupplier\Entity\CatalogCategoryCollection
	 */
	public function findCategories(int $supplierId): \Sellastica\CatalogSupplier\Entity\CatalogCategoryCollection
	{
		return $this->getEntitiesFromCacheOrStorage($this->mapper->findCategories($supplierId));
	}

	/**
	 * @inheritDoc
	 */
	protected function getBuilder(
		$data,
		$first = null,
		$second = null
	): \Sellastica\Entity\IBuilder
	{
		return \Sellastica\CatalogSupplier\Entity\CatalogCategoryBuilder::create($data->title)
			->hydrate($data);
	}

	/**
	 * @return \Sellastica\CatalogSupplier\Entity\CatalogCategoryCollection
	 */
	public function getEmptyCollection(): \Sellastica\Entity\Entity\EntityCollection
	{
		return new \Sellastica\CatalogSupplier\Entity\CatalogCategoryCollection;
	}
}