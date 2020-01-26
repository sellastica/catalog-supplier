<?php
namespace Sellastica\CatalogSupplier\Entity\B2bPartner\Service;

use Sellastica\CatalogSupplier\Entity\B2bPartner\Entity\B2bPartner;
use Sellastica\CatalogSupplier\Entity\B2bPartner\Entity\B2bPartnerCollection;
use Sellastica\Entity\Configuration;
use Sellastica\Entity\Entity\EntityCollection;

class B2bPartnerService
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
	 * @return null|B2bPartner
	 */
	public function find($id): ?B2bPartner
	{
		return $this->em->getRepository(B2bPartner::class)->find($id);
	}

	/**
	 * @param array $filter
	 * @param Configuration|null $configuration
	 * @return EntityCollection|B2bPartnerCollection|B2bPartner[]
	 */
	public function findBy(
		array $filter,
		Configuration $configuration = null
	): B2bPartnerCollection
	{
		return $this->em->getRepository(B2bPartner::class)
			->findBy($filter, $configuration);
	}

	/**
	 * @param array $filter
	 * @return null|B2bPartner
	 */
	public function findOneBy(array $filter): ?B2bPartner
	{
		return $this->em->getRepository(B2bPartner::class)->findOneBy($filter);
	}

	/**
	 * @param array $filter
	 * @return bool
	 */
	public function existsBy(array $filter): bool
	{
		return $this->em->getRepository(B2bPartner::class)->existsBy($filter);
	}

	/**
	 * @param Configuration|null $configuration
	 * @return EntityCollection|B2bPartnerCollection|B2bPartner[]
	 */
	public function findAll(
		Configuration $configuration = null
	): B2bPartnerCollection
	{
		return $this->em->getRepository(B2bPartner::class)
			->findAll($configuration);
	}

	/**
	 * @param \Sellastica\Identity\Model\Contact $contact
	 * @param \Sellastica\Localization\Model\Currency $currency
	 * @return B2bPartner
	 */
	public function create(
		\Sellastica\Identity\Model\Contact $contact,
		\Sellastica\Localization\Model\Currency $currency
	): B2bPartner
	{
		$supplier = \Sellastica\CatalogSupplier\Entity\B2bPartner\Entity\B2bPartnerBuilder::create($contact, $currency)
			->build();
		$this->em->persist($supplier);

		return $supplier;
	}

	/**
	 * @param B2bPartner $b2bPartner
	 */
	public function remove(B2bPartner $b2bPartner): void
	{
		$this->em->remove($b2bPartner);
	}
}