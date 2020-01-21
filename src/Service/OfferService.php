<?php
namespace Sellastica\CatalogSupplier\Service;

class OfferService
{
	/** @var \Sellastica\Entity\EntityManager */
	private $em;
	/** @var \Nette\Localization\ITranslator */
	private $translator;


	/**
	 * @param \Sellastica\Entity\EntityManager $em
	 * @param \Nette\Localization\ITranslator $translator
	 */
	public function __construct(
		\Sellastica\Entity\EntityManager $em,
		\Nette\Localization\ITranslator $translator
	)
	{
		$this->em = $em;
		$this->translator = $translator;
	}

	/**
	 * @param int $id
	 * @return null|\Sellastica\CatalogSupplier\Entity\Offer
	 */
	public function find(int $id): ?\Sellastica\CatalogSupplier\Entity\Offer
	{
		return $this->em->getRepository(\Sellastica\CatalogSupplier\Entity\Offer::class)->find($id);
	}

	/**
	 * @param array $filter
	 * @param \Sellastica\Entity\Configuration|null $configuration
	 * @return \Sellastica\CatalogSupplier\Entity\OfferCollection|\Sellastica\CatalogSupplier\Entity\Offer[]
	 */
	public function findBy(
		array $filter,
		\Sellastica\Entity\Configuration $configuration = null
	): \Sellastica\CatalogSupplier\Entity\OfferCollection
	{
		return $this->em->getRepository(\Sellastica\CatalogSupplier\Entity\Offer::class)
			->findBy($filter, $configuration);
	}

	/**
	 * @param array $filter
	 * @param \Sellastica\Entity\Configuration|null $configuration
	 * @return \Sellastica\CatalogSupplier\Entity\Offer|null
	 */
	public function findOneBy(
		array $filter,
		\Sellastica\Entity\Configuration $configuration = null
	): ?\Sellastica\CatalogSupplier\Entity\Offer
	{
		return $this->em->getRepository(\Sellastica\CatalogSupplier\Entity\Offer::class)
			->findOneBy($filter, $configuration);
	}

	/**
	 * @return \Sellastica\CatalogSupplier\Entity\Offer
	 */
	public function create(): \Sellastica\CatalogSupplier\Entity\Offer
	{
		$inquiry = \Sellastica\CatalogSupplier\Entity\OfferBuilder::create()
			->build();
		$this->em->persist($inquiry);

		return $inquiry;
	}
}