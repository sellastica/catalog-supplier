<?php
namespace Sellastica\CatalogSupplier\Entity;

/**
 * @generate-builder
 * @see SupplierInquiryBuilder
 *
 * @property SupplierInquiryRelations $relationService
 */
class SupplierInquiry extends \Sellastica\Entity\Entity\AbstractEntity
	implements \Sellastica\Entity\Entity\IEntity
{
	use \Sellastica\Entity\Entity\TAbstractEntity;

	/** @var int|null @optional */
	private $projectId;
	/** @var int|null @optional */
	private $adminUserId;
	/** @var \Sellastica\Identity\Model\Contact @required */
	private $contact;
	/** @var string @required */
	private $supplier;
	/** @var string|null @optional */
	private $supplierHomepage;
	/** @var string|null @optional */
	private $supplierEmail;
	/** @var string|null @optional */
	private $supplierPhone;
	/** @var string|null @optional */
	private $feedUrl;
	/** @var string|null @optional */
	private $login;
	/** @var string|null @optional */
	private $password;
	/** @var string|null @optional */
	private $note;
	/** @var \DateTime|null @optional */
	private $confirmed;
	/** @var \DateTime|null @optional */
	private $deadline;
	/** @var \DateTime|null @optional */
	private $accomplished;
	/** @var \DateTime|null @optional */
	private $closed;
	/** @var \DateTime|null @optional */
	private $cancelled;
	/** @var int|null @optional */
	private $ticketId;
	/** @var int|null @optional */
	private $supplierId;
	/** @var int|null @optional */
	private $feedId;
	/** @var \Sellastica\CatalogSupplier\Model\InquiryStatus @optional */
	private $status;
	/** @var float|null @optional */
	private $price;
	/** @var \DateTime|null @optional */
	private $paid;


	/**
	 * @param SupplierInquiryBuilder $builder
	 */
	public function __construct(SupplierInquiryBuilder $builder)
	{
		$this->hydrate($builder);
		$this->status = $this->status ?? \Sellastica\CatalogSupplier\Model\InquiryStatus::new();
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
		return $this->getNumber() . ': ' . $this->getSupplier();
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
	 * @return \Sellastica\Identity\Model\Contact
	 */
	public function getContact(): \Sellastica\Identity\Model\Contact
	{
		return $this->contact;
	}

	/**
	 * @param \Sellastica\Identity\Model\Contact $contact
	 */
	public function setContact(\Sellastica\Identity\Model\Contact $contact): void
	{
		$this->contact = $contact;
	}

	/**
	 * @return string
	 */
	public function getSupplier(): string
	{
		return $this->supplier;
	}

	/**
	 * @param string $supplier
	 */
	public function setSupplier(string $supplier): void
	{
		$this->supplier = $supplier;
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
	 * @return null|string
	 */
	public function getSupplierHomepage(): ?string
	{
		return $this->supplierHomepage;
	}

	/**
	 * @param null|string $supplierHomepage
	 */
	public function setSupplierHomepage(?string $supplierHomepage): void
	{
		$this->supplierHomepage = $supplierHomepage;
	}

	/**
	 * @return null|string
	 */
	public function getSupplierEmail(): ?string
	{
		return $this->supplierEmail;
	}

	/**
	 * @param null|string $supplierEmail
	 */
	public function setSupplierEmail(?string $supplierEmail): void
	{
		$this->supplierEmail = $supplierEmail;
	}

	/**
	 * @return null|string
	 */
	public function getSupplierPhone(): ?string
	{
		return $this->supplierPhone;
	}

	/**
	 * @param null|string $supplierPhone
	 */
	public function setSupplierPhone(?string $supplierPhone): void
	{
		$this->supplierPhone = $supplierPhone;
	}

	/**
	 * @return \DateTime|null
	 */
	public function getConfirmed(): ?\DateTime
	{
		return $this->confirmed;
	}

	/**
	 * @param \DateTime|null $confirmed
	 */
	public function setConfirmed(?\DateTime $confirmed): void
	{
		$this->confirmed = $confirmed;
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
	 * @return \DateTime|null
	 */
	public function getAccomplished(): ?\DateTime
	{
		return $this->accomplished;
	}

	/**
	 * @param \DateTime|null $accomplished
	 */
	public function setAccomplished(?\DateTime $accomplished): void
	{
		$this->accomplished = $accomplished;
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
	 * @return null|\Sellastica\Helpdesk\Entity\Ticket
	 */
	public function getTicket(): ?\Sellastica\Helpdesk\Entity\Ticket
	{
		return $this->relationService->getTicket();
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
	public function getSupplierId(): ?int
	{
		return $this->supplierId;
	}

	/**
	 * @param int|null $supplierId
	 */
	public function setSupplierId(?int $supplierId): void
	{
		$this->supplierId = $supplierId;
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
	 * @return \Sellastica\CatalogSupplier\Model\InquiryStatus
	 */
	public function getStatus(): \Sellastica\CatalogSupplier\Model\InquiryStatus
	{
		return $this->status;
	}

	/**
	 * @param \Sellastica\CatalogSupplier\Model\InquiryStatus $status
	 */
	public function setStatus(\Sellastica\CatalogSupplier\Model\InquiryStatus $status): void
	{
		$this->status = $status;
	}

	/**
	 * @return float|null
	 */
	public function getPrice(): ?float
	{
		return $this->price;
	}

	/**
	 * @param float|null $price
	 */
	public function setPrice(?float $price): void
	{
		$this->price = $price;
	}

	/**
	 * @return \DateTime|null
	 */
	public function getPaid(): ?\DateTime
	{
		return $this->paid;
	}

	/**
	 * @param \DateTime|null $paid
	 */
	public function setPaid(?\DateTime $paid): void
	{
		$this->paid = $paid;
	}

	/**
	 * @return array
	 */
	public function toArray(): array
	{
		return array_merge(
			$this->parentToArray(),
			$this->getContact()->toArray(),
			[
				'supplier' => $this->supplier,
				'projectId' => $this->projectId,
				'adminUserId' => $this->adminUserId,
				'supplierHomepage' => $this->supplierHomepage,
				'supplierEmail' => $this->supplierEmail,
				'supplierPhone' => $this->supplierPhone,
				'feedUrl' => $this->feedUrl,
				'login' => $this->login,
				'password' => $this->password,
				'note' => $this->note,
				'confirmed' => $this->confirmed,
				'deadline' => $this->deadline,
				'accomplished' => $this->accomplished,
				'closed' => $this->closed,
				'cancelled' => $this->cancelled,
				'ticketId' => $this->ticketId,
				'supplierId' => $this->supplierId,
				'feedId' => $this->feedId,
				'status' => $this->status->getValue(),
				'price' => $this->price,
				'paid' => $this->paid,
			]
		);
	}
}