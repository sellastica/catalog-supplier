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

	/** @var int|null @optional */
	private $projectId;
	/** @var int|null @optional */
	private $adminUserId;
	/** @var string|null @optional */
	private $feedUrl;
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
	/** @var \DateTime|null @optional */
	private $closed;
	/** @var \DateTime|null @optional */
	private $cancelled;


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
	 * @return int|null
	 */
	public function getProjectId(): ?int
	{
		return $this->projectId;
	}

	/**
	 * @param int|null $projectId
	 */
	public function setProjectId(?int $projectId): void
	{
		$this->projectId = $projectId;
	}

	/**
	 * @return \Sellastica\Project\Entity\Project|null
	 */
	public function getProject(): ?\Sellastica\Project\Entity\Project
	{
		return $this->relationService->getProject();
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
	 * @return array
	 */
	public function toArray(): array
	{
		return array_merge(
			$this->parentToArray(),
			[
				'projectId' => $this->projectId,
				'adminUserId' => $this->adminUserId,
				'feedUrl' => $this->feedUrl,
				'login' => $this->login,
				'password' => $this->password,
				'note' => $this->note,
				'deadline' => $this->deadline,
				'closed' => $this->closed,
				'cancelled' => $this->cancelled,
				'ticketId' => $this->ticketId,
				'feedId' => $this->feedId,
				'status' => $this->status->getValue(),
				'invoiceId' => $this->invoiceId,
			]
		);
	}
}