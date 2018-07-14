<?php
namespace Sellastica\CatalogSupplier\Mapping;

use Sellastica\Entity\IBuilder;
use Sellastica\Entity\Mapping\Dao;
use Sellastica\CatalogSupplier\Entity\CatalogFeedUrl;
use Sellastica\CatalogSupplier\Entity\CatalogFeedUrlBuilder;
use Sellastica\Entity\Entity\EntityCollection;
use Sellastica\CatalogSupplier\Entity\CatalogFeedUrlCollection;

/**
 * @see CatalogFeedUrl
 * @property CatalogFeedUrlDibiMapper $mapper
 */
class CatalogFeedUrlDao extends Dao
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
		return CatalogFeedUrlBuilder::create($data->feedId, $data->host)
			->hydrate($data);
	}

	/**
	 * @return EntityCollection|CatalogFeedUrlCollection
	 */
	public function getEmptyCollection(): EntityCollection
	{
		return new CatalogFeedUrlCollection;
	}
}