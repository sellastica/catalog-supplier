<?php
namespace Sellastica\CatalogSupplier\Entity;

class CatalogFeedRelations implements \Sellastica\Entity\Relation\IEntityRelations
{
	/** @var CatalogFeed */
	private $catalogFeed;
	/** @var \Sellastica\Entity\EntityManager */
	private $em;


	/**
	 * @param CatalogFeed $catalogFeed
	 * @param \Sellastica\Entity\EntityManager $em
	 */
	public function __construct(
		CatalogFeed $catalogFeed,
		\Sellastica\Entity\EntityManager $em
	)
	{
		$this->catalogFeed = $catalogFeed;
		$this->em = $em;
	}

	/**
	 * @return CatalogSupplier
	 */
	public function getSupplier(): CatalogSupplier
	{
		return $this->em->getRepository(CatalogSupplier::class)->find($this->catalogFeed->getSupplierId());
	}

	/**
	 * @return CatalogFeedUrlCollection
	 */
	public function getUrls(): CatalogFeedUrlCollection
	{
		return $this->em->getRepository(CatalogFeedUrl::class)->findBy([
			'feedId' => $this->catalogFeed->getId(),
		]);
	}
}