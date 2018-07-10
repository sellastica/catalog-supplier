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
	 * @return \Sellastica\Project\Entity\Project
	 */
	public function getUrls(): \Sellastica\Project\Entity\Project
	{
		return $this->em->getRepository(\Sellastica\Project\Entity\Project::class)->find($this->catalogSupplier->getProjectId());
	}
}