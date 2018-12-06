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
	 * @param int $categoryId
	 * @param \Sellastica\Entity\Configuration|null $configuration
	 * @return \Sellastica\CatalogSupplier\Entity\CatalogSupplierCollection
	 */
	public function findByCategoryId(
		int $categoryId,
		\Sellastica\Entity\Configuration $configuration = null
	): \Sellastica\CatalogSupplier\Entity\CatalogSupplierCollection
	{
		return $this->initialize($this->dao->findByCategoryId($categoryId, $configuration));
	}

	/**
	 * @param int $categoryId
	 * @param \Sellastica\Entity\Configuration|null $configuration
	 * @return \Sellastica\CatalogSupplier\Entity\CatalogSupplierCollection
	 */
	public function findVisibleByCategoryId(
		int $categoryId,
		\Sellastica\Entity\Configuration $configuration = null
	): \Sellastica\CatalogSupplier\Entity\CatalogSupplierCollection
	{
		return $this->initialize($this->dao->findVisibleByCategoryId($categoryId, $configuration));
	}
}