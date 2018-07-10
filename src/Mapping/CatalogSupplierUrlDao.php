<?php
namespace Sellastica\CatalogSupplier\Mapping;

use Sellastica\Entity\IBuilder;
use Sellastica\Entity\Mapping\Dao;
use Sellastica\CatalogSupplier\Entity\CatalogSupplierUrl;
use Sellastica\CatalogSupplier\Entity\CatalogSupplierUrlBuilder;
use Sellastica\Entity\Entity\EntityCollection;
use Sellastica\CatalogSupplier\Entity\CatalogSupplierUrlCollection;

/**
 * @see CatalogSupplierUrl
 * @property CatalogSupplierUrlDibiMapper $mapper
 */
class CatalogSupplierUrlDao extends Dao
{
	/**
	 * @inheritDoc
	 */
	protected function getBuilder(
		$data,
		$first = null,
		$second = null
	): IBuilder
	{
		return CatalogSupplierUrlBuilder::create($data->host)
			->hydrate($data);
	}

	/**
	 * @return EntityCollection|CatalogSupplierUrlCollection
	 */
	public function getEmptyCollection(): EntityCollection
	{
		return new CatalogSupplierUrlCollection;
	}
}