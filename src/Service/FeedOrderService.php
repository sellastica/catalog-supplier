<?php
namespace Sellastica\CatalogSupplier\Service;

class FeedOrderService
{
	/** @var \Sellastica\Entity\EntityManager */
	private $em;
	/** @var \Sellastica\Crm\Entity\TariffHistory\Service\TariffHistoryService */
	private $tariffHistoryService;
	/** @var \Nette\Localization\ITranslator */
	private $translator;
	/** @var \Sellastica\Crm\Entity\Tariff\Service\TariffService */
	private $tariffService;
	/** @var \Sellastica\App\Service\ApplicationService */
	private $applicationService;


	/**
	 * @param \Sellastica\Entity\EntityManager $em
	 * @param \Sellastica\Crm\Entity\TariffHistory\Service\TariffHistoryService $tariffHistoryService
	 * @param \Sellastica\Crm\Entity\Tariff\Service\TariffService $tariffService
	 * @param \Nette\Localization\ITranslator $translator
	 * @param \Sellastica\App\Service\ApplicationService $applicationService
	 */
	public function __construct(
		\Sellastica\Entity\EntityManager $em,
		\Sellastica\Crm\Entity\TariffHistory\Service\TariffHistoryService $tariffHistoryService,
		\Sellastica\Crm\Entity\Tariff\Service\TariffService $tariffService,
		\Nette\Localization\ITranslator $translator,
		\Sellastica\App\Service\ApplicationService $applicationService
	)
	{
		$this->em = $em;
		$this->tariffHistoryService = $tariffHistoryService;
		$this->translator = $translator;
		$this->tariffService = $tariffService;
		$this->applicationService = $applicationService;
	}

	/**
	 * @param \Sellastica\CatalogSupplier\Entity\ProjectFeed $projectFeed
	 * @param \Sellastica\Crm\Entity\Tariff\Entity\Tariff $tariff
	 * @return \Sellastica\Crm\Entity\TariffHistory\Entity\TariffHistory
	 */
	public function execute(
		\Sellastica\CatalogSupplier\Entity\ProjectFeed $projectFeed,
		\Sellastica\Crm\Entity\Tariff\Entity\Tariff $tariff
	): \Sellastica\Crm\Entity\TariffHistory\Entity\TariffHistory
	{
		$today = new \DateTime();
		$lastDayOfThisMonth = new \DateTime('last day of this month');
		$app = $this->applicationService->getApplication(\Sellastica\App\Service\ApplicationService::SUPPLIERS);

		$projectFeed->setOrdered(new \DateTime());

		if (!$history = $this->tariffHistoryService->getCurrentHistory($app, $projectFeed->getProject())) {
			$history = $this->tariffHistoryService->createNewHistory(
				$tariff,
				$projectFeed->getProject(),
				$this->translator->translate('apps.suppliers.accounting.tariff_from_till', [
					'count' => $tariff->getProducts(),
					'from' => $today->format('j.n.Y'),
					'till' => $lastDayOfThisMonth->format('j.n.Y'),
				]),
				$today,
				new \DateTime('last day of this month'),
				\Sellastica\Crm\Model\AccountingPeriod::monthly()
			);
		}

		return $history;
	}
}