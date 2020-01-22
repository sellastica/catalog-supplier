<?php
namespace Sellastica\CatalogSupplier\Mapping;

use Sellastica\CatalogSupplier\Entity\CatalogCategory;
use Sellastica\CatalogSupplier\Entity\ICatalogCategoryRepository;
use Sellastica\Entity\Mapping\Repository;

/**
 * @property CatalogCategoryDao $dao
 * @see CatalogCategory
 */
class CatalogCategoryRepository extends Repository implements ICatalogCategoryRepository
{
	/**
	 * @param int $supplierId
	 * @return \Sellastica\CatalogSupplier\Entity\CatalogCategoryCollection
	 */
	public function findCategories(int $supplierId): \Sellastica\CatalogSupplier\Entity\CatalogCategoryCollection
	{
		return $this->initialize($this->dao->findCategories($supplierId));
	}
}