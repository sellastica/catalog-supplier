<?php
namespace Sellastica\CatalogSupplier\Service;

class CatalogCategoryService
{
	/** @var \Sellastica\Entity\EntityManager */
	private $em;


	/**
	 * @param \Sellastica\Entity\EntityManager $em
	 */
	public function __construct(\Sellastica\Entity\EntityManager $em)
	{
		$this->em = $em;
	}

	/**
	 * @param $id
	 * @return null|\Sellastica\CatalogSupplier\Entity\CatalogCategory
	 */
	public function find($id): ?\Sellastica\CatalogSupplier\Entity\CatalogCategory
	{
		return $this->em->getRepository(\Sellastica\CatalogSupplier\Entity\CatalogCategory::class)->find($id);
	}

	/**
	 * @param array $filter
	 * @return null|\Sellastica\CatalogSupplier\Entity\CatalogCategory
	 */
	public function findOneBy(array $filter): ?\Sellastica\CatalogSupplier\Entity\CatalogCategory
	{
		return $this->em->getRepository(\Sellastica\CatalogSupplier\Entity\CatalogCategory::class)->findOneBy($filter);
	}

	/**
	 * @param \Sellastica\Entity\Configuration|null $configuration
	 * @return \Sellastica\Entity\Entity\EntityCollection|\Sellastica\CatalogSupplier\Entity\CatalogCategoryCollection|\Sellastica\CatalogSupplier\Entity\CatalogCategory[]
	 */
	public function findAll(
		\Sellastica\Entity\Configuration $configuration = null
	): \Sellastica\CatalogSupplier\Entity\CatalogCategoryCollection
	{
		return $this->em->getRepository(\Sellastica\CatalogSupplier\Entity\CatalogCategory::class)
			->findAll($configuration);
	}
}