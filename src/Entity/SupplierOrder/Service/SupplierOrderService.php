<?php
namespace Sellastica\CatalogSupplier\Service;

class SupplierOrderService
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
	 * @return null|\Sellastica\CatalogSupplier\Entity\SupplierOrder
	 */
	public function find(int $id): ?\Sellastica\CatalogSupplier\Entity\SupplierOrder
	{
		return $this->em->getRepository(\Sellastica\CatalogSupplier\Entity\SupplierOrder::class)->find($id);
	}

	/**
	 * @param array $filter
	 * @param \Sellastica\Entity\Configuration|null $configuration
	 * @return \Sellastica\CatalogSupplier\Entity\SupplierOrderCollection|\Sellastica\CatalogSupplier\Entity\SupplierOrder[]
	 */
	public function findBy(
		array $filter,
		\Sellastica\Entity\Configuration $configuration = null
	): \Sellastica\CatalogSupplier\Entity\SupplierOrderCollection
	{
		return $this->em->getRepository(\Sellastica\CatalogSupplier\Entity\SupplierOrder::class)
			->findBy($filter, $configuration);
	}

	/**
	 * @param array $filter
	 * @return bool
	 */
	public function existsBy(array $filter): bool
	{
		return $this->em->getRepository(\Sellastica\CatalogSupplier\Entity\SupplierOrder::class)
			->existsBy($filter);
	}

	/**
	 * @param int $projectId
	 * @param \Sellastica\Price\Price $price
	 * @return \Sellastica\CatalogSupplier\Entity\SupplierOrder
	 */
	public function create(
		int $projectId,
		\Sellastica\Price\Price $price
	): \Sellastica\CatalogSupplier\Entity\SupplierOrder
	{
		$inquiry = \Sellastica\CatalogSupplier\Entity\SupplierOrderBuilder::create($projectId, $price)
			->build();
		$this->em->persist($inquiry);

		return $inquiry;
	}
}