<?php
namespace Sellastica\CatalogSupplier\Service;

class CatalogSupplierService
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
	 * @return null|\Sellastica\CatalogSupplier\Entity\CatalogSupplier
	 */
	public function find($id): ?\Sellastica\CatalogSupplier\Entity\CatalogSupplier
	{
		return $this->em->getRepository(\Sellastica\CatalogSupplier\Entity\CatalogSupplier::class)->find($id);
	}

	/**
	 * @param array $filter
	 * @param \Sellastica\Entity\Configuration|null $configuration
	 * @return \Sellastica\Entity\Entity\EntityCollection|\Sellastica\CatalogSupplier\Entity\CatalogSupplierCollection|\Sellastica\CatalogSupplier\Entity\CatalogSupplier[]
	 */
	public function findBy(
		array $filter,
		\Sellastica\Entity\Configuration $configuration = null
	): \Sellastica\CatalogSupplier\Entity\CatalogSupplierCollection
	{
		return $this->em->getRepository(\Sellastica\CatalogSupplier\Entity\CatalogSupplier::class)
			->findBy($filter, $configuration);
	}

	/**
	 * @param array $filter
	 * @return null|\Sellastica\CatalogSupplier\Entity\CatalogSupplier
	 */
	public function findOneBy(array $filter): ?\Sellastica\CatalogSupplier\Entity\CatalogSupplier
	{
		return $this->em->getRepository(\Sellastica\CatalogSupplier\Entity\CatalogSupplier::class)->findOneBy($filter);
	}

	/**
	 * @param \Sellastica\Entity\Configuration|null $configuration
	 * @return \Sellastica\Entity\Entity\EntityCollection|\Sellastica\CatalogSupplier\Entity\CatalogSupplierCollection|\Sellastica\CatalogSupplier\Entity\CatalogSupplier[]
	 */
	public function findAll(
		\Sellastica\Entity\Configuration $configuration = null
	): \Sellastica\CatalogSupplier\Entity\CatalogSupplierCollection
	{
		return $this->em->getRepository(\Sellastica\CatalogSupplier\Entity\CatalogSupplier::class)
			->findAll($configuration);
	}

	/**
	 * @return int
	 */
	public function findCount(): int
	{
		return $this->em->getRepository(\Sellastica\CatalogSupplier\Entity\CatalogSupplier::class)
			->findCount();
	}

	/**
	 * @param string $title
	 * @param string $code
	 * @return \Sellastica\CatalogSupplier\Entity\CatalogSupplier
	 */
	public function create(string $title, string $code): \Sellastica\CatalogSupplier\Entity\CatalogSupplier
	{
		$supplier = \Sellastica\CatalogSupplier\Entity\CatalogSupplierBuilder::create($title, $code)
			->build();
		$this->em->persist($supplier);

		return $supplier;
	}
}