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
	/** @var bool @optional */
	private $confirmed = false;
	/** @var bool @optional */
	private $closed = false;
	/** @var int|null @optional */
	private $ticketId;
	/** @var int|null @optional */
	private $supplierId;
	/** @var int|null @optional */
	private $feedId;


	/**
	 * @param SupplierInquiryBuilder $builder
	 */
	public function __construct(SupplierInquiryBuilder $builder)
	{
		$this->hydrate($builder);
	}

	/**
	 * @return bool
	 */
	public static function isIdGeneratedByStorage(): bool
	{
		return true;
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
	 * @return bool
	 */
	public function isConfirmed(): bool
	{
		return $this->confirmed;
	}

	/**
	 * @param bool $confirmed
	 */
	public function setConfirmed(bool $confirmed): void
	{
		$this->confirmed = $confirmed;
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
	 * @return bool
	 */
	public function isClosed(): bool
	{
		return $this->closed;
	}

	/**
	 * @param bool $closed
	 */
	public function setClosed(bool $closed): void
	{
		$this->closed = $closed;
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
				'closed' => $this->closed,
				'ticketId' => $this->ticketId,
				'supplierId' => $this->supplierId,
				'feedId' => $this->feedId,
			]
		);
	}
}