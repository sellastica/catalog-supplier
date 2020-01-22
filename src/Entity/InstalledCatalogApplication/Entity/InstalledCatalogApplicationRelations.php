<?php
namespace Sellastica\CatalogSupplier\Entity;

class InstalledCatalogApplicationRelations implements \Sellastica\Entity\Relation\IEntityRelations
{
	/** @var InstalledCatalogApplication */
	private $installedCatalogApplication;
	/** @var \Sellastica\Entity\EntityManager */
	private $em;


	/**
	 * @param InstalledCatalogApplication $installedCatalogApplication
	 * @param \Sellastica\Entity\EntityManager $em
	 */
	public function __construct(
		InstalledCatalogApplication $installedCatalogApplication,
		\Sellastica\Entity\EntityManager $em
	)
	{
		$this->installedCatalogApplication = $installedCatalogApplication;
		$this->em = $em;
	}

	/**
	 * @return \Sellastica\Project\Entity\Project|null
	 */
	public function getProject(): ?\Sellastica\Project\Entity\Project
	{
		return $this->em->getRepository(\Sellastica\Project\Entity\Project::class)->find(
			$this->installedCatalogApplication->getProjectId()
		);
	}
}