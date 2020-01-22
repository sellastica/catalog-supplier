<?php
namespace Sellastica\CatalogSupplier\Entity\Order\Service;

class OrderTicketService
{
	/** @var \Nette\Bridges\ApplicationLatte\ILatteFactory */
	private $latteFactory;
	/** @var \Nette\Localization\ITranslator */
	private $translator;
	/** @var \Sellastica\HelpScout\HelpScoutService */
	private $helpScoutService;
	/** @var int */
	private $helpScoutMailboxId;


	/**
	 * @param int $helpScoutMailboxId
	 * @param \Nette\Bridges\ApplicationLatte\ILatteFactory $latteFactory
	 * @param \Nette\Localization\ITranslator $translator
	 * @param \Sellastica\HelpScout\HelpScoutService $helpScoutService
	 */
	public function __construct(
		int $helpScoutMailboxId,
		\Nette\Bridges\ApplicationLatte\ILatteFactory $latteFactory,
		\Nette\Localization\ITranslator $translator,
		\Sellastica\HelpScout\HelpScoutService $helpScoutService
	)
	{
		$this->latteFactory = $latteFactory;
		$this->translator = $translator;
		$this->helpScoutService = $helpScoutService;
		$this->helpScoutMailboxId = $helpScoutMailboxId;
	}

	/**
	 * @param \Sellastica\CatalogSupplier\Entity\SupplierOrder $order
	 * @param string $to
	 * @param array $updateFeeds
	 * @param array $attachmentUrls
	 * @throws \HelpScout\Api\Exception\Exception
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	public function execute(
		\Sellastica\CatalogSupplier\Entity\SupplierOrder $order,
		string $to,
		array $updateFeeds = [],
		array $attachmentUrls = []
	): void
	{
		$latte = $this->latteFactory->create();
		$body = $latte->renderToString(__DIR__ . '/../UI/Emails/Order.ticket.latte', [
			'order' => $order,
			'updateFeeds' => $updateFeeds,
			'attachmentUrls' => $attachmentUrls,
		]);

		$conversation = $this->helpScoutService->createConversation(
			$this->helpScoutMailboxId,
			$this->translator->translate('admin.emails.order.subject', [
				'title' => $order->getFeed()
					? $order->getFeed()->getSupplier()->getTitle()
					: ($order->getFeedDomain() ? $order->getTitle() : ''),
			]),
			$to
		);
		$tag = new \HelpScout\Api\Tags\Tag();
		$tag->setName('Objednávka');
		$conversation->addTag($tag);

		$this->helpScoutService->createMessageForSupport($conversation, $body);

		//assign ticket to the order
		if ($conversation->getId()) {
			$order->setTicketId($conversation->getId());
		}
	}
}