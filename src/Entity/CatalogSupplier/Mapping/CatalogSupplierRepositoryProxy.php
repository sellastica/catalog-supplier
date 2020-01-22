<?php
namespace Sellastica\CatalogSupplier\Mapping;

use Sellastica\CatalogSupplier\Entity\CatalogSupplier;
use Sellastica\CatalogSupplier\Entity\ICatalogSupplierRepository;
use Sellastica\Entity\Mapping\RepositoryProxy;

/**
 * @method CatalogSupplierRepository getRepository()
 * @see CatalogSupplier
 */
class CatalogSupplierRepositoryProxy extends RepositoryProxy implements ICatalogSupplierRepository
{
	use \Sellastica\DataGrid\Mapping\Dibi\TFilterRulesRepositoryProxy;

	public function findByCategoryId(
		int $categoryId,
		\Sellastica\Entity\Configuration $configuration = null
	): \Sellastica\CatalogSupplier\Entity\CatalogSupplierCollection
	{
		return $this->getRepository()->findByCategoryId($categoryId, $configuration);
	}

	public function findVisibleByCategoryId(
		int $categoryId,
		\Sellastica\Entity\Configuration $configuration = null
	): \Sellastica\CatalogSupplier\Entity\CatalogSupplierCollection
	{
		return $this->getRepository()->findVisibleByCategoryId($categoryId, $configuration);
	}
}