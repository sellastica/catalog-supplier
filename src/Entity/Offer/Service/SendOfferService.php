<?php
namespace Sellastica\CatalogSupplier\Entity\Offer\Service;

class SendOfferService
{
	/** @var \Nette\Bridges\ApplicationLatte\ILatteFactory */
	private $latteFactory;
	/** @var \Nette\Localization\ITranslator */
	private $translator;
	/** @var int */
	private $helpScoutMailboxId;
	/** @var \Sellastica\Integroid\Service\IntegroidUserService */
	private $integroidUserService;
	/** @var \Sellastica\HelpScout\HelpScoutService */
	private $helpScoutService;
	/** @var \Sellastica\HelpScout\HelpScoutApiFactory */
	private $helpScoutApiFactory;


	/**
	 * @param int $helpScoutMailboxId
	 * @param \Nette\Localization\ITranslator $translator
	 * @param \Sellastica\Integroid\Service\IntegroidUserService $integroidUserService
	 * @param \Sellastica\HelpScout\HelpScoutService $helpScoutService
	 * @param \Sellastica\HelpScout\HelpScoutApiFactory $helpScoutApiFactory
	 * @param \Nette\Bridges\ApplicationLatte\ILatteFactory $latteFactory
	 */
	public function __construct(
		int $helpScoutMailboxId,
		\Nette\Localization\ITranslator $translator,
		\Sellastica\Integroid\Service\IntegroidUserService $integroidUserService,
		\Sellastica\HelpScout\HelpScoutService $helpScoutService,
		\Sellastica\HelpScout\HelpScoutApiFactory $helpScoutApiFactory,
		\Nette\Bridges\ApplicationLatte\ILatteFactory $latteFactory
	)
	{
		$this->translator = $translator;
		$this->helpScoutMailboxId = $helpScoutMailboxId;
		$this->integroidUserService = $integroidUserService;
		$this->helpScoutService = $helpScoutService;
		$this->helpScoutApiFactory = $helpScoutApiFactory;
		$this->latteFactory = $latteFactory;
	}

	/**
	 * @param \Sellastica\CatalogSupplier\Entity\Offer $offer
	 */
	public function execute(
		\Sellastica\CatalogSupplier\Entity\Offer $offer
	): void
	{
		if (!$offer->getProject()
			&& !$offer->getTicketId()) {
			throw new \MongoDB\Exception\UnexpectedValueException(
				'Recipient unknown, conversation nor project not defined'
			);
		}

		$helpScout = $this->helpScoutApiFactory->create();
		if ($offer->getTicketId()) {
			try {
				$conversation = $helpScout->conversations()->get($offer->getTicketId());
			} catch (\HelpScout\Api\Exception\Exception | \GuzzleHttp\Exception\GuzzleException $e) {
			}
		}

		if ($offer->getTicketId()
			&& empty($conversation)) {
			throw new \UnexpectedValueException(sprintf('Conversation %s not found', $offer->getTicketId()));
		}

		if (empty($conversation)) {
			//create new conversation
			$conversation = $this->createConversation($offer);
		}

		$latte = $this->latteFactory->create();
		$body = $latte->renderToString(__DIR__ . '/../UI/Emails/Offer.email.latte', [
			'offer' => $offer,
		]);
		$this->helpScoutService->createMessageForCustomer($conversation, $body);
		$helpScout->conversations()
			->updateStatus($conversation->getId(), \HelpScout\Api\Conversations\Status::CLOSED);

		$offer->setTicketId($conversation->getId());
	}

	/**
	 * @param \Sellastica\CatalogSupplier\Entity\Offer $offer
	 * @return \HelpScout\Api\Conversations\Conversation
	 */
	private function createConversation(
		\Sellastica\CatalogSupplier\Entity\Offer $offer
	): \HelpScout\Api\Conversations\Conversation
	{
		return $this->helpScoutService->createConversation(
			$this->helpScoutMailboxId,
			$this->translator->translate('admin.offers.email_subject', ['supplier' => $offer->getResolvedTitle()]),
			$offer->getProject()->getEmail()
		);
	}
}