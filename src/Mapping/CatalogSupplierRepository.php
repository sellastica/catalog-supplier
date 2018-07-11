<?php
namespace Sellastica\CatalogSupplier\Mapping;

use Sellastica\CatalogSupplier\Entity\CatalogSupplier;
use Sellastica\CatalogSupplier\Entity\ICatalogSupplierRepository;
use Sellastica\Entity\Mapping\Repository;

/**
 * @property CatalogSupplierDao $dao
 * @see CatalogSupplier
 */
class CatalogSupplierRepository extends Repository implements ICatalogSupplierRepository
{
	use \Sellastica\DataGrid\Mapping\Dibi\TFilterRulesRepository;


	/**
	 * @param array $hosts
	 * @return \Sellastica\CatalogSupplier\Entity\CatalogSupplierCollection
	 */
	public function findByHosts(array $hosts): \Sellastica\CatalogSupplier\Entity\CatalogSupplierCollection
	{
		return $this->initialize($this->dao->findByHosts($hosts));
	}
}