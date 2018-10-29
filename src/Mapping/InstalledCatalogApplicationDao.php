<?php
namespace Sellastica\CatalogSupplier\Mapping;

/**
 * @see \Sellastica\CatalogSupplier\Entity\InstalledCatalogApplication
 * @property InstalledCatalogApplicationDibiMapper $mapper
 */
class InstalledCatalogApplicationDao extends \Sellastica\Entity\Mapping\Dao
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
		$data->options = \Nette\Utils\Json::decode($data->options, \Nette\Utils\Json::FORCE_ARRAY);
		return \Sellastica\CatalogSupplier\Entity\InstalledCatalogApplicationBuilder::create($data->applicationId, $data->catalogFeedId, $data->projectId)
			->hydrate($data);
	}

	/**
	 * @return \Sellastica\CatalogSupplier\Entity\InstalledCatalogApplicationCollection
	 */
	public function getEmptyCollection(): \Sellastica\Entity\Entity\EntityCollection
	{
		return new \Sellastica\CatalogSupplier\Entity\InstalledCatalogApplicationCollection;
	}
}