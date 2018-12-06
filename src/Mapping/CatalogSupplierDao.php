<?php
namespace Sellastica\CatalogSupplier\Mapping;

/**
 * @see \Sellastica\CatalogSupplier\Entity\CatalogSupplier
 * @property CatalogSupplierDibiMapper $mapper
 */
class CatalogSupplierDao extends \Sellastica\Entity\Mapping\Dao
{
	use \Sellastica\DataGrid\Mapping\Dibi\TFilterRulesDao;

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
		return $this->getEntitiesFromCacheOrStorage($this->mapper->findByCategoryId($categoryId, $configuration));
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
		return $this->getEntitiesFromCacheOrStorage($this->mapper->findVisibleByCategoryId($categoryId, $configuration));
	}

	/**
	 * @inheritDoc
	 */
	protected function getBuilder(
		$data,
		$first = null,
		$second = null
	): \Sellastica\Entity\IBuilder
	{
		if ($data->homepage) {
			$data->homepage = new \Nette\Http\Url($data->homepage);
		}

		if ($data->email) {
			$data->email = new \Sellastica\Identity\Model\Email($data->email);
		}

		return \Sellastica\CatalogSupplier\Entity\CatalogSupplierBuilder::create($data->title, $data->code)
			->hydrate($data);
	}

	/**
	 * @return \Sellastica\CatalogSupplier\Entity\CatalogSupplierCollection
	 */
	public function getEmptyCollection(): \Sellastica\Entity\Entity\EntityCollection
	{
		return new \Sellastica\CatalogSupplier\Entity\CatalogSupplierCollection;
	}
}