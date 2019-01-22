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
	/** @var \App\UI\Integroid\UI\Emails\EmailFactory */
	private $emailFactory;
	/** @var string */
	private $integroidEmail;
	/** @var \Sellastica\SmtpMailer\SmtpMailer */
	private $mailer;
	/** @var \Sellastica\Integroid\Service\IntegroidUserService */
	private $integroidUserService;


	/**
	 * @param \Sellastica\Entity\EntityManager $em
	 * @param \Sellastica\Crm\Entity\TariffHistory\Service\TariffHistoryService $tariffHistoryService
	 * @param \Sellastica\Crm\Entity\Tariff\Service\TariffService $tariffService
	 * @param \Nette\Localization\ITranslator $translator
	 * @param \Sellastica\App\Service\ApplicationService $applicationService
	 * @param \App\UI\Integroid\UI\Emails\EmailFactory $emailFactory
	 * @param \Nette\DI\Container $container
	 * @param \Sellastica\SmtpMailer\SmtpMailer $mailer
	 * @param \Sellastica\Integroid\Service\IntegroidUserService $integroidUserService
	 */
	public function __construct(
		\Sellastica\Entity\EntityManager $em,
		\Sellastica\Crm\Entity\TariffHistory\Service\TariffHistoryService $tariffHistoryService,
		\Sellastica\Crm\Entity\Tariff\Service\TariffService $tariffService,
		\Nette\Localization\ITranslator $translator,
		\Sellastica\App\Service\ApplicationService $applicationService,
		\App\UI\Integroid\UI\Emails\EmailFactory $emailFactory,
		\Nette\DI\Container $container,
		\Sellastica\SmtpMailer\SmtpMailer $mailer,
		\Sellastica\Integroid\Service\IntegroidUserService $integroidUserService
	)
	{
		$this->em = $em;
		$this->tariffHistoryService = $tariffHistoryService;
		$this->translator = $translator;
		$this->tariffService = $tariffService;
		$this->applicationService = $applicationService;
		$this->emailFactory = $emailFactory;
		$this->integroidEmail = $container->parameters['application']['email'];
		$this->mailer = $mailer;
		$this->integroidUserService = $integroidUserService;
	}

	/**
	 * @param \Suppliers\Entity\Feed\Entity\Feed $feed
	 * @param \Sellastica\CatalogSupplier\Entity\ProjectFeed $projectFeed
	 * @param \Sellastica\Crm\Entity\Tariff\Entity\Tariff $tariff
	 * @return \Sellastica\Crm\Entity\TariffHistory\Entity\TariffHistory
	 */
	public function execute(
		\Suppliers\Entity\Feed\Entity\Feed $feed,
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

		//send email
		$this->sendEmail($feed, $projectFeed);

		return $history;
	}

	/**
	 * @param \Suppliers\Entity\Feed\Entity\Feed $feed
	 * @param \Sellastica\CatalogSupplier\Entity\ProjectFeed $projectFeed
	 */
	private function sendEmail(
		\Suppliers\Entity\Feed\Entity\Feed $feed,
		\Sellastica\CatalogSupplier\Entity\ProjectFeed $projectFeed
	): void
	{
		$emailBody = $this->emailFactory->create(__DIR__ . '/../../../../../app/model/Suppliers/UI/Emails/order.latte', [
			'project' => $projectFeed->getProject(),
			'feed' => $feed,
			'projectFeed' => $projectFeed,
			'integroidUser' => $this->integroidUserService->findOneByProjectId($projectFeed->getProject()->getId()),
		]);
		$message = new \Nette\Mail\Message();
		$message->setFrom($this->integroidEmail);
		$message->addTo($projectFeed->getProject()->getEmail());
		$message->setSubject($this->translator->translate('apps.suppliers.emails.order.subject', [
			'supplier' => $projectFeed->getCatalogFeed()->getSupplier()->getTitle(),
		]));
		$message->setHtmlBody($emailBody);

		$this->mailer->send($message);
	}
}