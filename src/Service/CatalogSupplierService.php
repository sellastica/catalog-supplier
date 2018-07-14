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
}