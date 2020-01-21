<?php
namespace Sellastica\CatalogSupplier\Mapping;

/**
 * @see \Sellastica\CatalogSupplier\Entity\Offer
 * @property OfferDibiMapper $mapper
 */
class OfferDao extends \Sellastica\Entity\Mapping\Dao
{
	use \Sellastica\DataGrid\Mapping\Dibi\TFilterRulesDao;

	/**
	 * @inheritDoc
	 */
	protected function getBuilder(
		$data,
		$first = null,
		$second = null
	): \Sellastica\Entity\IBuilder
	{
		$data->status = \Sellastica\CatalogSupplier\Model\OfferStatus::from($data->status);
		$data->price = new \Sellastica\Price\Price(
			$data->price,
			false,
			\Sellastica\Accounting\VatRateTypeFactory::getVatRate(\Sellastica\Localization\Model\Country::cz()),
			\Sellastica\Localization\Model\Currency::from($data->currency)
		);
		return \Sellastica\CatalogSupplier\Entity\OfferBuilder::create()
			->hydrate($data);
	}

	/**
	 * @return \Sellastica\CatalogSupplier\Entity\OfferCollection
	 */
	public function getEmptyCollection(): \Sellastica\Entity\Entity\EntityCollection
	{
		return new \Sellastica\CatalogSupplier\Entity\OfferCollection;
	}
}