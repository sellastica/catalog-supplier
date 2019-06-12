<?php
namespace Sellastica\CatalogSupplier\Entity;

class CatalogFeedRelations implements \Sellastica\Entity\Relation\IEntityRelations
{
	/** @var CatalogFeed */
	private $catalogFeed;
	/** @var \Sellastica\Entity\EntityManager */
	private $em;
	/** @var \Sellastica\CatalogSupplier\Service\CatalogFeedService */
	private $catalogFeedService;


	/**
	 * @param CatalogFeed $catalogFeed
	 * @param \Sellastica\CatalogSupplier\Service\CatalogFeedService $catalogFeedService
	 * @param \Sellastica\Entity\EntityManager $em
	 */
	public function __construct(
		CatalogFeed $catalogFeed,
		\Sellastica\CatalogSupplier\Service\CatalogFeedService $catalogFeedService,
		\Sellastica\Entity\EntityManager $em
	)
	{
		$this->catalogFeed = $catalogFeed;
		$this->em = $em;
		$this->catalogFeedService = $catalogFeedService;
	}

	/**
	 * @return CatalogSupplier
	 */
	public function getSupplier(): CatalogSupplier
	{
		return $this->em->getRepository(CatalogSupplier::class)->find($this->catalogFeed->getSupplierId());
	}

	/**
	 * @return CatalogFeed|null
	 */
	public function getParent(): ?CatalogFeed
	{
		return $this->catalogFeed->getParentId()
			? $this->catalogFeedService->find($this->catalogFeed->getParentId())
			: null;
	}

	/**
	 * @return CatalogFeedRuleCollection
	 */
	public function getRules(): CatalogFeedRuleCollection
	{
		return $this->em->getRepository(CatalogFeedRule::class)->findBy([
			'feedId' => $this->catalogFeed->getId(),
		]);
	}

	/**
	 * @return CatalogFeedCollection
	 */
	public function getSubordinateFeeds(): CatalogFeedCollection
	{
		return $this->catalogFeedService->findBy([
			'parentId' => $this->catalogFeed->getId(),
		]);
	}
}