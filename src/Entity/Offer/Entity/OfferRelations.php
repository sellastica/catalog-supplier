<?php
namespace Sellastica\CatalogSupplier\Entity;

class OfferRelations implements \Sellastica\Entity\Relation\IEntityRelations
{
	/** @var \Sellastica\Entity\EntityManager */
	private $em;
	/** @var Offer */
	private $offer;


	/**
	 * @param Offer $offer
	 * @param \Sellastica\Entity\EntityManager $em
	 */
	public function __construct(
		Offer $offer,
		\Sellastica\Entity\EntityManager $em
	)
	{
		$this->em = $em;
		$this->offer = $offer;
	}

	/**
	 * @return CatalogFeed|null
	 */
	public function getFeed(): ?CatalogFeed
	{
		return $this->em->getRepository(CatalogFeed::class)->find($this->offer->getFeedId());
	}

	/**
	 * @return SupplierInquiry|null
	 */
	public function getInquiry(): ?SupplierInquiry
	{
		return $this->em->getRepository(SupplierInquiry::class)->find($this->offer->getInquiryId());
	}

	/**
	 * @return \Sellastica\Project\Entity\Project|null
	 */
	public function getProject(): ?\Sellastica\Project\Entity\Project
	{
		return $this->em->getRepository(\Sellastica\Project\Entity\Project::class)
			->find($this->offer->getProjectId());
	}

	/**
	 * @return \Sellastica\Integroid\Entity\IntegroidUser|null
	 */
	public function getAdminUser(): ?\Sellastica\Integroid\Entity\IntegroidUser
	{
		return $this->em->getRepository(\Sellastica\Integroid\Entity\IntegroidUser::class)
			->find($this->offer->getAdminUserId());
	}
}