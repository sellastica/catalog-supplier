<?php
namespace Sellastica\CatalogSupplier\Mapping;

/**
 * @see \Sellastica\CatalogSupplier\Entity\CatalogCategory
 */
class CatalogCategoryDibiMapper extends \Sellastica\Entity\Mapping\DibiMapper
{
	/**
	 * @param int $supplierId
	 * @return array
	 */
	public function findCategories(int $supplierId): array
	{
		return $this->database->select('categoryId')
			->from('crm_all.suppliers_supplier_catetory_rel')
			->where('supplierId = %i', $supplierId)
			->fetchPairs();
	}

	/**
	 * @return bool
	 */
	protected function isInCrmDatabase(): bool
	{
		return true;
	}

	/**
	 * @param bool $databaseName
	 * @return string
	 */
	protected function getTableName($databaseName = false): string
	{
		return ($databaseName ? $this->environment->getCommonCrmDatabaseName() . '.' : '')
			. 'suppliers_category';
	}
}