<?php
namespace Sellastica\CatalogSupplier\Mapping;

/**
 * @see \Sellastica\CatalogSupplier\Entity\CatalogSupplier
 */
class CatalogSupplierDibiMapper extends \Sellastica\Entity\Mapping\DibiMapper
{
	use \Sellastica\DataGrid\Mapping\Dibi\TFilterRulesDibiMapper;

	/**
	 * @param int $categoryId
	 * @param \Sellastica\Entity\Configuration|null $configuration
	 * @return array
	 */
	public function findByCategoryId(
		int $categoryId,
		\Sellastica\Entity\Configuration $configuration = null
	): array
	{
		return $this->getResourceWithIds($configuration)
			->innerJoin('%n.suppliers_supplier_category_rel scr', \Sellastica\Core\Model\Environment::NAPOJSE_CRM)
			->on('scr.supplierId = %n.id', $this->getTableName())
			->where('scr.categoryId = %i', $categoryId)
			->fetchPairs();
	}

	/**
	 * @param int $categoryId
	 * @param \Sellastica\Entity\Configuration|null $configuration
	 * @return array
	 */
	public function findVisibleByCategoryId(
		int $categoryId,
		\Sellastica\Entity\Configuration $configuration = null
	): array
	{
		return $this->getPublishableResourceWithIds($configuration)
			->innerJoin('%n.suppliers_supplier_category_rel scr', \Sellastica\Core\Model\Environment::NAPOJSE_CRM)
			->on('scr.supplierId = %n.id', $this->getTableName())
			->where('scr.categoryId = %i', $categoryId)
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
	 * @param \Sellastica\Entity\Configuration $configuration
	 * @return \Dibi\Fluent
	 */
	protected function getPublishableResource(\Sellastica\Entity\Configuration $configuration = NULL)
	{
		return parent::getResource($configuration)
			->where('visible = 1');
	}

	/**
	 * @param bool $databaseName
	 * @return string
	 */
	protected function getTableName($databaseName = false): string
	{
		return ($databaseName ? $this->environment->getNapojSeCrmDatabaseName() . '.' : '')
			. 'suppliers_supplier';
	}
}