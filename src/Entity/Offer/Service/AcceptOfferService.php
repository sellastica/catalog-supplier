<?php
namespace Sellastica\CatalogSupplier\Service;

class AcceptOfferService
{
	/** @var SupplierOrderService */
	private $orderService;
	/** @var \Sellastica\CatalogSupplier\Entity\Order\Service\SendOrderService */
	private $sendOrderService;
	/** @var \Sellastica\Entity\EntityManager */
	private $em;
	/** @var \Sellastica\CatalogSupplier\Entity\Order\Service\OrderTicketService */
	private $orderTicketService;


	/**
	 * @param SupplierOrderService $orderService
	 * @param \Sellastica\Entity\EntityManager $em
	 * @param \Sellastica\CatalogSupplier\Entity\Order\Service\SendOrderService $sendOrderService
	 * @param \Sellastica\CatalogSupplier\Entity\Order\Service\OrderTicketService $orderTicketService
	 */
	public function __construct(
		SupplierOrderService $orderService,
		\Sellastica\Entity\EntityManager $em,
		\Sellastica\CatalogSupplier\Entity\Order\Service\SendOrderService $sendOrderService,
		\Sellastica\CatalogSupplier\Entity\Order\Service\OrderTicketService $orderTicketService
	)
	{
		$this->orderService = $orderService;
		$this->sendOrderService = $sendOrderService;
		$this->em = $em;
		$this->orderTicketService = $orderTicketService;
	}

	/**
	 * @param \Sellastica\CatalogSupplier\Entity\Offer $offer
	 * @param string|null $toEmail
	 * @return \Sellastica\CatalogSupplier\Entity\SupplierOrder
	 * @throws \UnexpectedValueException
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 * @throws \HelpScout\Api\Exception\Exception
	 */
	public function execute(
		\Sellastica\CatalogSupplier\Entity\Offer $offer,
		string $toEmail = null
	): \Sellastica\CatalogSupplier\Entity\SupplierOrder
	{
		if (!$offer->getProject()) {
			throw new \UnexpectedValueException('Cannot create order, project ID must be defined');
		}

		$offer->setStatus(\Sellastica\CatalogSupplier\Model\OfferStatus::accepted());
		$offer->setStatusChanged(new \DateTime());

		$order = $this->orderService->create($offer->getProjectId(), $offer->getPrice());
		$order->setOfferId($offer->getId());
		$order->setAdminUserId($offer->getAdminUserId());
		$order->setFeedUrl($offer->getFeedUrl());
		$order->setFeedId($offer->getFeedId());
		$order->setLogin($offer->getLogin());
		$order->setPassword($offer->getPassword());
		$order->setNote($offer->getNote());
		$order->setRegular($offer->isRegular());

		$order->setAdditionalFeedUrl1($offer->getAdditionalFeedUrl1());
		$order->setAdditionalFeedUrl2($offer->getAdditionalFeedUrl2());
		$order->setAdditionalFeedUrl3($offer->getAdditionalFeedUrl3());
		$order->setAdditionalFeedUrl4($offer->getAdditionalFeedUrl4());
		$order->setAdditionalFeedUrl5($offer->getAdditionalFeedUrl5());

		//retrieve order ID
		$this->em->flush();

		if ($toEmail) {
			//create ticket for support
			$this->orderTicketService->execute(
				$order,
				$toEmail
			);
			//send order email
			$this->sendOrderService->execute($order, $toEmail);
		}

		return $order;
	}
}