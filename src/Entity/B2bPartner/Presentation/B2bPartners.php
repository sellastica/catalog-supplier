<?php
namespace Sellastica\CatalogSupplier\Entity\B2bPartner\Presentation;

class B2bPartners extends \Sellastica\Twig\Model\TwigObject
{
	/** @var \Sellastica\CatalogSupplier\Entity\B2bPartner\Entity\IB2bPartnerRepository */
	private $repository;
	/** @var \Package\Twig\Debugger\ErrorHandler */
	private $errorHandler;
	/** @var \Sellastica\Entity\EntityManager */
	private $em;
	/** @var \Sellastica\CatalogSupplier\Entity\Commission\Service\CommissionService */
	private $commissionService;
	/** @var \Dibi\Connection */
	private $connection;
	/** @var \Sellastica\Core\Model\Environment */
	private $environment;


	/**
	 * @param \Sellastica\CatalogSupplier\Entity\B2bPartner\Entity\IB2bPartnerRepository $repository
	 * @param \Sellastica\CatalogSupplier\Entity\Commission\Service\CommissionService $commissionService
	 * @param \Package\Twig\Debugger\ErrorHandler $errorHandler
	 * @param \Sellastica\Entity\EntityManager $em
	 * @param \Dibi\Connection $connection
	 * @param \Sellastica\Core\Model\Environment $environment
	 */
	public function __construct(
		\Sellastica\CatalogSupplier\Entity\B2bPartner\Entity\IB2bPartnerRepository $repository,
		\Sellastica\CatalogSupplier\Entity\Commission\Service\CommissionService $commissionService,
		\Package\Twig\Debugger\ErrorHandler $errorHandler,
		\Sellastica\Entity\EntityManager $em,
		\Dibi\Connection $connection,
		\Sellastica\Core\Model\Environment $environment
	)
	{
		$this->repository = $repository;
		$this->errorHandler = $errorHandler;
		$this->em = $em;
		$this->commissionService = $commissionService;
		$this->connection = $connection;
		$this->environment = $environment;
	}

	/**
	 * Finds article by handle
	 * @param int $id
	 * @return B2bPartnerProxy|null
	 */
	public function getId($id = null): ?B2bPartnerProxy
	{
		if (($convertedId = \Sellastica\Utils\Conversions::toInt($id)) === false) {
			$this->errorHandler->getAssertionHandler()->intError($id, __FUNCTION__);
			return null;
		}

		/** @var \Sellastica\Entity\Entity\IEntity|\Sellastica\Twig\Model\IProxable $entity */
		$entity = $this->repository->findPublishable($convertedId);
		return isset($entity) ? $entity->toProxy() : null;
	}

	/**
	 * @param $b2bPartnerId
	 * @return array
	 */
	public function getCommission_summaries(int $b2bPartnerId): array
	{
		$commissionSummaries = [];
		foreach ($this->commissionService->findCommissionSummaries($b2bPartnerId) as $commissionSummary) {
			$commissionSummaries[] = [
				'month' => $commissionSummary->getMonth(),
				'year' => $commissionSummary->getYear(),
				'price' => $commissionSummary->getPrice()->toProxy(),
				'price_to_pay' => $commissionSummary->getPriceToPay()->toProxy(),
			];
		}

		return $commissionSummaries;
	}

	/**
	 * @param int $b2bPartnerId
	 * @param string $currency
	 * @return \Sellastica\Price\PriceProxy
	 */
	public function getPrice_to_pay(
		int $b2bPartnerId,
		string $currency
	): \Sellastica\Price\PriceProxy
	{
		return $this->commissionService->getPriceToPay(
			$b2bPartnerId,
			\Sellastica\Localization\Model\Currency::from($currency)
		)->toProxy();
	}

	/**
	 * @param int $b2bPartnerId
	 * @return array
	 */
	public function getProjects(int $b2bPartnerId): array
	{
		$result = $this->connection->select('title, created')
			->from('%n.project', $this->environment->getNapojSeCrmDatabaseName())
			->where('b2bPartnerId = %i', $b2bPartnerId);
		$projects = [];
		foreach ($result as $row) {
			$projects[] = [
				'title' => $row->title,
				'created_at' => $row->created->format('c'),
			];
		}

		return $projects;
	}

	/**
	 * @return string
	 */
	public function getShortName(): string
	{
		return 'b2b_partners';
	}

	/**
	 * @return array
	 */
	public function getAllowedProperties(): array
	{
		return [
			'id',
			'commission_summaries',
			'price_to_pay',
			'projects',
		];
	}
}
