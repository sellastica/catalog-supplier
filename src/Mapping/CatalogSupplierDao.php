<?php
namespace Sellastica\CatalogSupplier\Mapping;

/**
 * @see \Sellastica\CatalogSupplier\Entity\CatalogSupplier
 * @property CatalogSupplierDibiMapper $mapper
 */
class CatalogSupplierDao extends \Sellastica\Entity\Mapping\Dao
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
		return \Sellastica\CatalogSupplier\Entity\CatalogSupplierBuilder::create($data->title)
			->hydrate($data);
	}

	/**
	 * @return \Sellastica\CatalogSupplier\Entity\CatalogSupplierCollection
	 */
	public function getEmptyCollection(): \Sellastica\Entity\Entity\EntityCollection
	{
		return new \Sellastica\CatalogSupplier\Entity\CatalogSupplierCollection;
	}
}