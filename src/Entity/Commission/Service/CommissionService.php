<?php
namespace Sellastica\CatalogSupplier\Entity\Commission\Service;

class CommissionService
{
	/** @var \Sellastica\Entity\EntityManager */
	private $em;


	/**
	 * @param \Sellastica\Entity\EntityManager $em
	 */
	public function __construct(
		\Sellastica\Entity\EntityManager $em
	)
	{
		$this->em = $em;
	}

	/**
	 * @param int $id
	 * @return null|\Sellastica\CatalogSupplier\Entity\Commission\Entity\Commission
	 */
	public function find(int $id): ?\Sellastica\CatalogSupplier\Entity\Commission\Entity\Commission
	{
		return $this->em->getRepository(\Sellastica\CatalogSupplier\Entity\Commission\Entity\Commission::class)->find($id);
	}

	/**
	 * @param \Sellastica\Entity\Configuration|null $configuration
	 * @return \Sellastica\CatalogSupplier\Entity\Commission\Entity\CommissionCollection|\Sellastica\CatalogSupplier\Entity\Commission\Entity\Commission[]
	 */
	public function findAll(
		\Sellastica\Entity\Configuration $configuration = null
	): \Sellastica\CatalogSupplier\Entity\Commission\Entity\CommissionCollection
	{
		return $this->em->getRepository(\Sellastica\CatalogSupplier\Entity\Commission\Entity\Commission::class)
			->findAll($configuration);
	}

	/**
	 * @param array $filter
	 * @param \Sellastica\Entity\Configuration|null $configuration
	 * @return \Sellastica\CatalogSupplier\Entity\Commission\Entity\CommissionCollection|\Sellastica\CatalogSupplier\Entity\Commission\Entity\Commission[]
	 */
	public function findBy(
		array $filter,
		\Sellastica\Entity\Configuration $configuration = null
	): \Sellastica\CatalogSupplier\Entity\Commission\Entity\CommissionCollection
	{
		return $this->em->getRepository(\Sellastica\CatalogSupplier\Entity\Commission\Entity\Commission::class)
			->findBy($filter, $configuration);
	}

	/**
	 * @param array $filter
	 * @param \Sellastica\Entity\Configuration|null $configuration
	 * @return \Sellastica\CatalogSupplier\Entity\Commission\Entity\Commission|null
	 */
	public function findOneBy(
		array $filter,
		\Sellastica\Entity\Configuration $configuration = null
	): ?\Sellastica\CatalogSupplier\Entity\Commission\Entity\Commission
	{
		return $this->em->getRepository(\Sellastica\CatalogSupplier\Entity\Commission\Entity\Commission::class)
			->findOneBy($filter, $configuration);
	}

	/**
	 * @param array $filter
	 * @return int
	 */
	public function findCountBy(array $filter): int
	{
		return $this->em->getRepository(\Sellastica\CatalogSupplier\Entity\Commission\Entity\Commission::class)
			->findCountBy($filter);
	}

	/**
	 * @param array $filter
	 * @return bool
	 */
	public function existsBy(array $filter): bool
	{
		return $this->em->getRepository(\Sellastica\CatalogSupplier\Entity\Commission\Entity\Commission::class)->existsBy($filter);
	}

	/**
	 * @param int $b2bProjectId
	 * @return \Sellastica\CatalogSupplier\Entity\Commission\Model\CommissionSummary[]
	 */
	public function findCommissionSummaries(int $b2bProjectId): array
	{
		$summaries = [];
		$result = $this->em->getRepository(\Sellastica\CatalogSupplier\Entity\Commission\Entity\Commission::class)
			->findCommissionSummaries($b2bProjectId);
		foreach ($result as $line) {
			$summary = \Sellastica\CatalogSupplier\Entity\Commission\Model\CommissionSummary::fromArray((array)$line);
			$summaries[$summary->getMonthAndYear()] = $summary;
		}

		return $summaries;
	}

	/**
	 * @param int $b2bProjectId
	 * @param \Sellastica\Localization\Model\Currency $currency
	 * @return \Sellastica\Price\Price
	 */
	public function getPriceToPay(
		int $b2bProjectId,
		\Sellastica\Localization\Model\Currency $currency
	): \Sellastica\Price\Price
	{
		return $this->em->getRepository(\Sellastica\CatalogSupplier\Entity\Commission\Entity\Commission::class)
			->getPriceToPay($b2bProjectId, $currency);
	}

	/**
	 * @param int $b2bProjectId
	 * @return \Sellastica\CatalogSupplier\Entity\Commission\Entity\Commission|null
	 */
	public function findFirst(int $b2bProjectId): ?\Sellastica\CatalogSupplier\Entity\Commission\Entity\Commission
	{
		return $this->findOneBy(
			['b2bProjectId' => $b2bProjectId],
			\Sellastica\Entity\Configuration::sortBy('created')
				->addSorterRule('id')
		);
	}

	/**
	 * @param int $b2bProjectId
	 * @return \Sellastica\CatalogSupplier\Entity\Commission\Entity\Commission|null
	 */
	public function findLast(int $b2bProjectId): ?\Sellastica\CatalogSupplier\Entity\Commission\Entity\Commission
	{
		return $this->findOneBy(
			['b2bProjectId' => $b2bProjectId],
			\Sellastica\Entity\Configuration::sortBy('created', false)
				->addSorterRule('id', false)
		);
	}

	/**
	 * @param int $invoiceId
	 * @param int $projectId
	 * @param int $b2bProjectId
	 * @param int $commissionRatio
	 * @param \Sellastica\Price\Price $commission
	 * @return \Sellastica\CatalogSupplier\Entity\Commission\Entity\Commission
	 */
	public function create(
		int $invoiceId,
		int $projectId,
		int $b2bProjectId,
		int $commissionRatio,
		\Sellastica\Price\Price $commission
	): \Sellastica\CatalogSupplier\Entity\Commission\Entity\Commission
	{
		$commission = \Sellastica\CatalogSupplier\Entity\Commission\Entity\CommissionBuilder::create(
			$invoiceId,
			$projectId,
			$b2bProjectId,
			$commissionRatio,
			$commission
		)->build();
		$this->em->persist($commission);

		return $commission;
	}
}