<?php
namespace Sellastica\CatalogSupplier\Mapping;

/**
 * @see \Sellastica\CatalogSupplier\Entity\Supplier
 * @property SupplierDibiMapper $mapper
 */
class SupplierDao extends \Sellastica\Entity\Mapping\Dao
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
		return \Sellastica\CatalogSupplier\Entity\SupplierBuilder::create($data->title, $data->code)
			->hydrate($data);
	}

	/**
	 * @return \Sellastica\CatalogSupplier\Entity\SupplierCollection
	 */
	public function getEmptyCollection(): \Sellastica\Entity\Entity\EntityCollection
	{
		return new \Sellastica\CatalogSupplier\Entity\SupplierCollection;
	}
}