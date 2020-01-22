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
		$data->contact = new \Sellastica\Identity\Model\Contact(
			$data->firstName,
			$data->lastName,
			new \Sellastica\Identity\Model\Email($data->email),
			$data->phone
		);
		$data->currency = \Sellastica\Localization\Model\Currency::from($data->currency);
		$data->password = new \Sellastica\Identity\Model\Password($data->password);

		return \Sellastica\CatalogSupplier\Entity\B2bPartner\Entity\B2bPartnerBuilder::create(
			$data->contact,
			$data->currency
		)->hydrate($data);
	}

	/**
	 * @return \Sellastica\CatalogSupplier\Entity\B2bPartner\Entity\B2bPartnerCollection
	 */
	public function getEmptyCollection(): \Sellastica\Entity\Entity\EntityCollection
	{
		return new \Sellastica\CatalogSupplier\Entity\B2bPartner\Entity\B2bPartnerCollection;
	}
}