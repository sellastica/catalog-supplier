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
			->from('%n.suppliers_supplier_category_rel', \Sellastica\Core\Model\Environment::NAPOJSE_CRM)
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
		return ($databaseName ? $this->environment->getNapojSeCrmDatabaseName() . '.' : '')
			. 'suppliers_category';
	}
}