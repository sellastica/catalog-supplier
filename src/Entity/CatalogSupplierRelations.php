<?php
namespace Sellastica\CatalogSupplier\Entity;

class CatalogSupplierRelations implements \Sellastica\Entity\Relation\IEntityRelations
{
	/** @var CatalogSupplier */
	private $catalogSupplier;
	/** @var \Sellastica\Entity\EntityManager */
	private $em;


	/**
	 * @param CatalogSupplier $catalogSupplier
	 * @param \Sellastica\Entity\EntityManager $em
	 */
	public function __construct(
		CatalogSupplier $catalogSupplier,
		\Sellastica\Entity\EntityManager $em
	)
	{
		$this->catalogSupplier = $catalogSupplier;
		$this->em = $em;
	}

	/**
	 * @return CatalogSupplierUrlCollection
	 */
	public function getUrls(): CatalogSupplierUrlCollection
	{
		return $this->em->getRepository(CatalogSupplierUrl::class)->findBy([
			'supplierId' => $this->catalogSupplier->getId(),
		]);
	}
}