<?php
namespace Sellastica\CatalogSupplier\Mapping;

use Sellastica\Entity\Mapping\Repository;
use Sellastica\CatalogSupplier\Entity\CatalogCategory;
use Sellastica\CatalogSupplier\Entity\ICatalogCategoryRepository;

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