<?php
namespace Sellastica\CatalogSupplier\Entity;

/**
 * @generate-builder
 * @see SupplierOrderBuilder
 *
 * @property SupplierOrderRelations $relationService
 */
class SupplierOrder extends \Sellastica\Entity\Entity\AbstractEntity
	implements \Sellastica\Entity\Entity\IEntity
{
	use \Sellastica\Entity\Entity\TAbstractEntity;

	/** @var int @required */
	private $projectId;
	/** @var \Sellastica\Price\Price @required */
	private $price;
	/** @var int|null @optional */
	private $offerId;
	/** @var int|null @optional */
	private $adminUserId;
	/** @var string|null @optional */
	private $feedUrl;
	/** @var string|null @optional */
	private $additionalFeedUrl1;
	/** @var string|null @optional */
	private $additionalFeedUrl2;
	/** @var string|null @optional */
	private $additionalFeedUrl3;
	/** @var string|null @optional */
	private $additionalFeedUrl4;
	/** @var string|null @optional */
	private $additionalFeedUrl5;
	/** @var string|null @optional */
	private $login;
	/** @var string|null @optional */
	private $password;
	/** @var string|null @optional */
	private $note;
	/** @var \DateTime|null @optional */
	private $deadline;
	/** @var int|null @optional */
	private $ticketId;
	/** @var int|null @optional */
	private $feedId;
	/** @var int|null @optional */
	private $invoiceId;
	/** @var \Sellastica\CatalogSupplier\Model\OrderStatus @optional */
	private $status;
	/** @var bool @optional */
	private $regular = true;
	/** @var \DateTime|null @optional */
	private $closed;
	/** @var \DateTime|null @optional */
	private $cancelled;
	/** @var \DateTime|null @optional */
	private $sent;
	/** @var string|null @optional */
	private $sentToEmail;
	/** @var bool @optional */
	private $supportNotified = false;


	/**
	 * @param SupplierOrderBuilder $builder
	 */
	public function __construct(SupplierOrderBuilder $builder)
	{
		$this->hydrate($builder);
		$this->status = $this->status ?? \Sellastica\CatalogSupplier\Model\OrderStatus::new();
	}

	/**
	 * @return bool
	 */
	public static function isIdGeneratedByStorage(): bool
	{
		return true;
	}

	/**
	 * @return string
	 */
	public function getNumber(): string
	{
		return '#' . $this->id;
	}

	/**
	 * @return string
	 */
	public function getTitle(): string
	{
		return $this->getFeedDomain()
			? \Nette\Utils\Strings::firstUpper($this->getFeedDomain())
			: $this->getNumber();
	}

	/**
	 * @return int
	 */
	public function getProjectId(): int
	{
		return $this->projectId;
	}

	/**
	 * @param int $projectId
	 */
	public function setProjectId(int $projectId): void
	{
		$this->projectId = $projectId;
	}

	/**
	 * @return \Sellastica\Project\Entity\Project
	 */
	public function getProject(): \Sellastica\Project\Entity\Project
	{
		return $this->relationService->getProject();
	}

	/**
	 * @return int|null
	 */
	public function getOfferId(): ?int
	{
		return $this->offerId;
	}

	/**
	 * @param int|null $offerId
	 */
	public function setOfferId(?int $offerId): void
	{
		$this->offerId = $offerId;
	}

	/**
	 * @return int|null
	 */
	public function getAdminUserId(): ?int
	{
		return $this->adminUserId;
	}

	/**
	 * @param int|null $adminUserId
	 */
	public function setAdminUserId(?int $adminUserId): void
	{
		$this->adminUserId = $adminUserId;
	}

	/**
	 * @return null|\Sellastica\Integroid\Entity\IntegroidUser
	 */
	public function getAdminUser(): ?\Sellastica\Integroid\Entity\IntegroidUser
	{
		return $this->relationService->getAdminUser();
	}

	/**
	 * @return null|string
	 */
	public function getFeedUrl(): ?string
	{
		return $this->feedUrl;
	}

	/**
	 * @param null|string $feedUrl
	 */
	public function setFeedUrl(?string $feedUrl): void
	{
		$this->feedUrl = $feedUrl;
	}

	/**
	 * @return string|null
	 */
	public function getFeedDomain(): ?string
	{
		if (!$this->feedUrl) {
			return null;
		}

		$extract = new \LayerShifter\TLDExtract\Extract();
		$result = $extract->parse($this->feedUrl);
		return $result->getRegistrableDomain();
	}

	/**
	 * @return string|null
	 */
	public function getAdditionalFeedUrl1(): ?string
	{
		return $this->additionalFeedUrl1;
	}

	/**
	 * @param string|null $additionalFeedUrl1
	 */
	public function setAdditionalFeedUrl1(?string $additionalFeedUrl1): void
	{
		$this->additionalFeedUrl1 = $additionalFeedUrl1;
	}

	/**
	 * @return string|null
	 */
	public function getAdditionalFeedUrl2(): ?string
	{
		return $this->additionalFeedUrl2;
	}

	/**
	 * @param string|null $additionalFeedUrl2
	 */
	public function setAdditionalFeedUrl2(?string $additionalFeedUrl2): void
	{
		$this->additionalFeedUrl2 = $additionalFeedUrl2;
	}

	/**
	 * @return string|null
	 */
	public function getAdditionalFeedUrl3(): ?string
	{
		return $this->additionalFeedUrl3;
	}

	/**
	 * @param string|null $additionalFeedUrl3
	 */
	public function setAdditionalFeedUrl3(?string $additionalFeedUrl3): void
	{
		$this->additionalFeedUrl3 = $additionalFeedUrl3;
	}

	/**
	 * @return string|null
	 */
	public function getAdditionalFeedUrl4(): ?string
	{
		return $this->additionalFeedUrl4;
	}

	/**
	 * @param string|null $additionalFeedUrl4
	 */
	public function setAdditionalFeedUrl4(?string $additionalFeedUrl4): void
	{
		$this->additionalFeedUrl4 = $additionalFeedUrl4;
	}

	/**
	 * @return string|null
	 */
	public function getAdditionalFeedUrl5(): ?string
	{
		return $this->additionalFeedUrl5;
	}

	/**
	 * @param string|null $additionalFeedUrl5
	 */
	public function setAdditionalFeedUrl5(?string $additionalFeedUrl5): void
	{
		$this->additionalFeedUrl5 = $additionalFeedUrl5;
	}

	/**
	 * @return array
	 */
	public function getAdditionalFeedUrls(): array
	{
		$return = [];
		for ($i = 1; $i <= 5; $i++) {
			if ($url = $this->{"additionalFeedUrl$i"}) {
				$return[] = $url;
			}
		}

		return $return;
	}

	/**
	 * @return null|string
	 */
	public function getNote(): ?string
	{
		return $this->note;
	}

	/**
	 * @param null|string $note
	 */
	public function setNote(?string $note): void
	{
		$this->note = $note;
	}

	/**
	 * @return \DateTime|null
	 */
	public function getDeadline(): ?\DateTime
	{
		return $this->deadline;
	}

	/**
	 * @param \DateTime|null $deadline
	 */
	public function setDeadline(?\DateTime $deadline): void
	{
		$this->deadline = $deadline;
	}

	/**
	 * @return bool
	 */
	public function isDeadline(): bool
	{
		return isset($this->deadline)
			&& $this->deadline == new \DateTime('today');
	}

	/**
	 * @return bool
	 */
	public function isDeadlineOverdue(): bool
	{
		return isset($this->deadline)
			&& $this->deadline < new \DateTime('today');
	}

	/**
	 * @return int|null
	 */
	public function getTicketId(): ?int
	{
		return $this->ticketId;
	}

	/**
	 * @param int|null $ticketId
	 */
	public function setTicketId(?int $ticketId): void
	{
		$this->ticketId = $ticketId;
	}

	/**
	 * @return \DateTime|null
	 */
	public function getClosed(): ?\DateTime
	{
		return $this->closed;
	}

	/**
	 * @param \DateTime|null $closed
	 */
	public function setClosed(?\DateTime $closed): void
	{
		$this->closed = $closed;
	}

	/**
	 * @return \DateTime|null
	 */
	public function getCancelled(): ?\DateTime
	{
		return $this->cancelled;
	}

	/**
	 * @param \DateTime|null $cancelled
	 */
	public function setCancelled(?\DateTime $cancelled): void
	{
		$this->cancelled = $cancelled;
	}

	/**
	 * @return null|string
	 */
	public function getLogin(): ?string
	{
		return $this->login;
	}

	/**
	 * @param null|string $login
	 */
	public function setLogin(?string $login): void
	{
		$this->login = $login;
	}

	/**
	 * @return null|string
	 */
	public function getPassword(): ?string
	{
		return $this->password;
	}

	/**
	 * @param null|string $password
	 */
	public function setPassword(?string $password): void
	{
		$this->password = $password;
	}

	/**
	 * @return int|null
	 */
	public function getFeedId(): ?int
	{
		return $this->feedId;
	}

	/**
	 * @param int|null $feedId
	 */
	public function setFeedId(?int $feedId): void
	{
		$this->feedId = $feedId;
	}

	/**
	 * @return CatalogFeed|null
	 */
	public function getFeed(): ?CatalogFeed
	{
		return $this->relationService->getFeed();
	}

	/**
	 * @return \Sellastica\CatalogSupplier\Model\OrderStatus
	 */
	public function getStatus(): \Sellastica\CatalogSupplier\Model\OrderStatus
	{
		return $this->status;
	}

	/**
	 * @param \Sellastica\CatalogSupplier\Model\OrderStatus $status
	 */
	public function setStatus(\Sellastica\CatalogSupplier\Model\OrderStatus $status): void
	{
		$this->status = $status;
	}

	/**
	 * @return int|null
	 */
	public function getInvoiceId(): ?int
	{
		return $this->invoiceId;
	}

	/**
	 * @param int|null $invoiceId
	 */
	public function setInvoiceId(?int $invoiceId): void
	{
		$this->invoiceId = $invoiceId;
	}

	/**
	 * @return \Sellastica\Crm\Entity\Invoice\Entity\Invoice|null
	 */
	public function getInvoice(): ?\Sellastica\Crm\Entity\Invoice\Entity\Invoice
	{
		return $this->relationService->getInvoice();
	}

	/**
	 * @return \Sellastica\Price\Price
	 */
	public function getPrice(): \Sellastica\Price\Price
	{
		return $this->price;
	}

	/**
	 * @param \Sellastica\Price\Price $price
	 */
	public function setPrice(\Sellastica\Price\Price $price): void
	{
		$this->price = $price;
	}

	/**
	 * @return bool
	 */
	public function isRegular(): bool
	{
		return $this->regular;
	}

	/**
	 * @param bool $regular
	 */
	public function setRegular(bool $regular): void
	{
		$this->regular = $regular;
	}

	/**
	 * @return \DateTime|null
	 */
	public function getSent(): ?\DateTime
	{
		return $this->sent;
	}

	/**
	 * @param \DateTime|null $sent
	 */
	public function setSent(?\DateTime $sent): void
	{
		$this->sent = $sent;
	}

	/**
	 * @return string|null
	 */
	public function getSentToEmail(): ?string
	{
		return $this->sentToEmail;
	}

	/**
	 * @param string|null $sentToEmail
	 */
	public function setSentToEmail(?string $sentToEmail): void
	{
		$this->sentToEmail = $sentToEmail;
	}

	/**
	 * @return bool
	 */
	public function isSupportNotified(): bool
	{
		return $this->supportNotified;
	}

	/**
	 * @param bool $supportNotified
	 */
	public function setSupportNotified(bool $supportNotified): void
	{
		$this->supportNotified = $supportNotified;
	}

	/**
	 * @return array
	 */
	public function toArray(): array
	{
		return array_merge(
			$this->parentToArray(),
			[
				'projectId' => $this->projectId,
				'offerId' => $this->offerId,
				'adminUserId' => $this->adminUserId,
				'feedUrl' => $this->feedUrl,
				'additionalFeedUrl1' => $this->additionalFeedUrl1,
				'additionalFeedUrl2' => $this->additionalFeedUrl2,
				'additionalFeedUrl3' => $this->additionalFeedUrl3,
				'additionalFeedUrl4' => $this->additionalFeedUrl4,
				'additionalFeedUrl5' => $this->additionalFeedUrl5,
				'login' => $this->login,
				'password' => $this->password,
				'note' => $this->note,
				'deadline' => $this->deadline,
				'ticketId' => $this->ticketId,
				'feedId' => $this->feedId,
				'status' => $this->status->getValue(),
				'invoiceId' => $this->invoiceId,
				'price' => $this->price->getWithoutTax(),
				'currency' => $this->price->getCurrency()->getCode(),
				'regular' => $this->regular,
				'closed' => $this->closed,
				'cancelled' => $this->cancelled,
				'sent' => $this->sent,
				'sentToEmail' => $this->sentToEmail,
				'supportNotified' => $this->supportNotified,
			]
		);
	}
}