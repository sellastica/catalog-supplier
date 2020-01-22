<?php
namespace Sellastica\CatalogSupplier\Mapping;

/**
 * @see \Sellastica\CatalogSupplier\Entity\SupplierInquiry
 * @property SupplierInquiryDibiMapper $mapper
 */
class SupplierInquiryDao extends \Sellastica\Entity\Mapping\Dao
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
		return \Sellastica\CatalogSupplier\Entity\SupplierInquiryBuilder::create($data->projectId)
			->hydrate($data);
	}

	/**
	 * @return \Sellastica\CatalogSupplier\Entity\SupplierInquiryCollection
	 */
	public function getEmptyCollection(): \Sellastica\Entity\Entity\EntityCollection
	{
		return new \Sellastica\CatalogSupplier\Entity\SupplierInquiryCollection;
	}
}