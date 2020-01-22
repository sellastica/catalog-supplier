<?php
namespace Sellastica\CatalogSupplier\Mapping;

/**
 * @see \Sellastica\CatalogSupplier\Entity\SupplierOrder
 * @property SupplierOrderDibiMapper $mapper
 */
class SupplierOrderDao extends \Sellastica\Entity\Mapping\Dao
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
		$data->price = new \Sellastica\Price\Price(
			$data->price,
			false,
			\Sellastica\Accounting\VatRateTypeFactory::getVatRate(\Sellastica\Localization\Model\Country::cz()),
			\Sellastica\Localization\Model\Currency::from($data->currency)
		);
		$data->status = \Sellastica\CatalogSupplier\Model\OrderStatus::from($data->status);
		return \Sellastica\CatalogSupplier\Entity\SupplierOrderBuilder::create($data->projectId, $data->price)
			->hydrate($data);
	}

	/**
	 * @return \Sellastica\CatalogSupplier\Entity\SupplierOrderCollection
	 */
	public function getEmptyCollection(): \Sellastica\Entity\Entity\EntityCollection
	{
		return new \Sellastica\CatalogSupplier\Entity\SupplierOrderCollection;
	}
}