<?php
namespace Sellastica\CatalogSupplier\Entity;

class SupplierInquiryRelations implements \Sellastica\Entity\Relation\IEntityRelations
{
	/** @var \Sellastica\Entity\EntityManager */
	private $em;
	/** @var SupplierInquiry */
	private $inquiry;


	/**
	 * @param SupplierInquiry $inquiry
	 * @param \Sellastica\Entity\EntityManager $em
	 */
	public function __construct(
		SupplierInquiry $inquiry,
		\Sellastica\Entity\EntityManager $em
	)
	{
		$this->em = $em;
		$this->inquiry = $inquiry;
	}

	/**
	 * @return \Sellastica\Project\Entity\Project
	 */
	public function getProject(): \Sellastica\Project\Entity\Project
	{
		return $this->em->getRepository(\Sellastica\Project\Entity\Project::class)->find($this->inquiry->getProjectId());
	}

	/**
	 * @return \Sellastica\Integroid\Entity\IntegroidUser|null
	 */
	public function getAdminUser(): ?\Sellastica\Integroid\Entity\IntegroidUser
	{
		return $this->em->getRepository(\Sellastica\Integroid\Entity\IntegroidUser::class)->find($this->inquiry->getAdminUserId());
	}
}