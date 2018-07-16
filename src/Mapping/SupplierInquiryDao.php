<?php
namespace Sellastica\CatalogSupplier\Mapping;

/**
 * @see \Sellastica\CatalogSupplier\Entity\SupplierInquiry
 * @property SupplierInquiryDibiMapper $mapper
 */
class SupplierInquiryDao extends \Sellastica\Entity\Mapping\Dao
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
		$contact = new \Sellastica\Identity\Model\Contact(
			$data->firstName,
			$data->lastName,
			new \Sellastica\Identity\Model\Email($data->email)
		);
		$contact->setPhone($data->phone);

		return \Sellastica\CatalogSupplier\Entity\SupplierInquiryBuilder::create($contact, $data->supplier)
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