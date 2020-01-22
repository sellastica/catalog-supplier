<?php
namespace Sellastica\CatalogSupplier\Entity\B2bPartner\Mapping;

/**
 * @see \Sellastica\CatalogSupplier\Entity\B2bPartner\Entity\B2bPartner
 * @property B2bPartnerDibiMapper $mapper
 */
class B2bPartnerDao extends \Sellastica\Entity\Mapping\Dao
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
		return \Sellastica\CatalogSupplier\Entity\B2bPartner\Entity\B2bPartnerBuilder::create($data->contact, $data->currency)
			->hydrate($data);
	}

	/**
	 * @return \Sellastica\CatalogSupplier\Entity\B2bPartner\Entity\B2bPartnerCollection
	 */
	public function getEmptyCollection(): \Sellastica\Entity\Entity\EntityCollection
	{
		return new \Sellastica\CatalogSupplier\Entity\B2bPartner\Entity\B2bPartnerCollection;
	}
}