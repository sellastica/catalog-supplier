<?php
namespace Sellastica\CatalogSupplier\Entity\Order\Service;

class SendOrderService
{
	/** @var \Nette\Bridges\ApplicationLatte\ILatteFactory */
	private $latteFactory;
	/** @var \Nette\Localization\ITranslator */
	private $translator;
	/** @var string */
	private $senderEmail;
	/** @var \Nette\Mail\IMailer */
	private $mailer;


	/**
	 * @param string $senderEmail
	 * @param \Nette\Bridges\ApplicationLatte\ILatteFactory $latteFactory
	 * @param \Nette\Localization\ITranslator $translator
	 * @param \Nette\Mail\IMailer $mailer
	 */
	public function __construct(
		string $senderEmail,
		\Nette\Bridges\ApplicationLatte\ILatteFactory $latteFactory,
		\Nette\Localization\ITranslator $translator,
		\Nette\Mail\IMailer $mailer
	)
	{
		$this->latteFactory = $latteFactory;
		$this->translator = $translator;
		$this->senderEmail = $senderEmail;
		$this->mailer = $mailer;
	}

	/**
	 * @param \Sellastica\CatalogSupplier\Entity\SupplierOrder $order
	 * @param string $toEmail
	 * @throws \Exception
	 */
	public function execute(
		\Sellastica\CatalogSupplier\Entity\SupplierOrder $order,
		string $toEmail
	): void
	{
		$latte = $this->latteFactory->create();
		$body = $latte->renderToString(__DIR__ . '/../UI/Emails/Order.email.latte', [
			'layout' => __DIR__ . '/../../../integroid/src/UI/Emails/@layout_napojse.latte',
			'order' => $order,
		]);
		$message = new \Nette\Mail\Message();
		$message->setSubject($this->translator->translate('admin.emails.order.subject', [
			'title' => $order->getFeed()
				? $order->getFeed()->getSupplier()->getTitle()
				: ($order->getFeedDomain() ? $order->getTitle() : ''),
		]));
		$message->setFrom($this->senderEmail);
		$message->addReplyTo($this->senderEmail);
		$message->setHtmlBody($body);
		$message->setHeader('isTransactional', 'True');
		$message->addTo($toEmail);

		$this->mailer->send($message);

		$order->setSent(new \DateTime());
		$order->setSentToEmail($toEmail);
	}
}