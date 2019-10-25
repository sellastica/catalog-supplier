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
		$data->status = \Sellastica\CatalogSupplier\Model\OrderStatus::from($data->status);
		return \Sellastica\CatalogSupplier\Entity\SupplierOrderBuilder::create()
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