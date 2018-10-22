<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\IBuilder;
use Sellastica\Entity\TBuilder;

/**
 * @see SupplierInquiry
 */
class SupplierInquiryBuilder implements IBuilder
{
	use TBuilder;

	/** @var \Sellastica\Identity\Model\Contact */
	private $contact;
	/** @var string */
	private $supplier;
	/** @var int|null */
	private $projectId;
	/** @var int|null */
	private $adminUserId;
	/** @var string|null */
	private $supplierHomepage;
	/** @var string|null */
	private $supplierEmail;
	/** @var string|null */
	private $supplierPhone;
	/** @var string|null */
	private $feedUrl;
	/** @var string|null */
	private $login;
	/** @var string|null */
	private $password;
	/** @var string|null */
	private $note;
	/** @var \DateTime|null */
	private $confirmed;
	/** @var \DateTime|null */
	private $deadline;
	/** @var \DateTime|null */
	private $accomplished;
	/** @var \DateTime|null */
	private $closed;
	/** @var \DateTime|null */
	private $cancelled;
	/** @var int|null */
	private $ticketId;
	/** @var int|null */
	private $supplierId;
	/** @var int|null */
	private $feedId;
	/** @var \Sellastica\CatalogSupplier\Model\InquiryStatus */
	private $status;
	/** @var float|null */
	private $price;

	/**
	 * @param \Sellastica\Identity\Model\Contact $contact
	 * @param string $supplier
	 */
	public function __construct(
		\Sellastica\Identity\Model\Contact $contact,
		string $supplier
	)
	{
		$this->contact = $contact;
		$this->supplier = $supplier;
	}

	/**
	 * @return \Sellastica\Identity\Model\Contact
	 */
	public function getContact(): \Sellastica\Identity\Model\Contact
	{
		return $this->contact;
	}

	/**
	 * @return string
	 */
	public function getSupplier(): string
	{
		return $this->supplier;
	}

	/**
	 * @return int|null
	 */
	public function getProjectId()
	{
		return $this->projectId;
	}

	/**
	 * @param int|null $projectId
	 * @return $this
	 */
	public function projectId(int $projectId = null)
	{
		$this->projectId = $projectId;
		return $this;
	}

	/**
	 * @return int|null
	 */
	public function getAdminUserId()
	{
		return $this->adminUserId;
	}

	/**
	 * @param int|null $adminUserId
	 * @return $this
	 */
	public function adminUserId(int $adminUserId = null)
	{
		$this->adminUserId = $adminUserId;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getSupplierHomepage()
	{
		return $this->supplierHomepage;
	}

	/**
	 * @param string|null $supplierHomepage
	 * @return $this
	 */
	public function supplierHomepage(string $supplierHomepage = null)
	{
		$this->supplierHomepage = $supplierHomepage;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getSupplierEmail()
	{
		return $this->supplierEmail;
	}

	/**
	 * @param string|null $supplierEmail
	 * @return $this
	 */
	public function supplierEmail(string $supplierEmail = null)
	{
		$this->supplierEmail = $supplierEmail;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getSupplierPhone()
	{
		return $this->supplierPhone;
	}

	/**
	 * @param string|null $supplierPhone
	 * @return $this
	 */
	public function supplierPhone(string $supplierPhone = null)
	{
		$this->supplierPhone = $supplierPhone;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getFeedUrl()
	{
		return $this->feedUrl;
	}

	/**
	 * @param string|null $feedUrl
	 * @return $this
	 */
	public function feedUrl(string $feedUrl = null)
	{
		$this->feedUrl = $feedUrl;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getLogin()
	{
		return $this->login;
	}

	/**
	 * @param string|null $login
	 * @return $this
	 */
	public function login(string $login = null)
	{
		$this->login = $login;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getPassword()
	{
		return $this->password;
	}

	/**
	 * @param string|null $password
	 * @return $this
	 */
	public function password(string $password = null)
	{
		$this->password = $password;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getNote()
	{
		return $this->note;
	}

	/**
	 * @param string|null $note
	 * @return $this
	 */
	public function note(string $note = null)
	{
		$this->note = $note;
		return $this;
	}

	/**
	 * @return \DateTime|null
	 */
	public function getConfirmed()
	{
		return $this->confirmed;
	}

	/**
	 * @param \DateTime|null $confirmed
	 * @return $this
	 */
	public function confirmed(\DateTime $confirmed = null)
	{
		$this->confirmed = $confirmed;
		return $this;
	}

	/**
	 * @return \DateTime|null
	 */
	public function getDeadline()
	{
		return $this->deadline;
	}

	/**
	 * @param \DateTime|null $deadline
	 * @return $this
	 */
	public function deadline(\DateTime $deadline = null)
	{
		$this->deadline = $deadline;
		return $this;
	}

	/**
	 * @return \DateTime|null
	 */
	public function getAccomplished()
	{
		return $this->accomplished;
	}

	/**
	 * @param \DateTime|null $accomplished
	 * @return $this
	 */
	public function accomplished(\DateTime $accomplished = null)
	{
		$this->accomplished = $accomplished;
		return $this;
	}

	/**
	 * @return \DateTime|null
	 */
	public function getClosed()
	{
		return $this->closed;
	}

	/**
	 * @param \DateTime|null $closed
	 * @return $this
	 */
	public function closed(\DateTime $closed = null)
	{
		$this->closed = $closed;
		return $this;
	}

	/**
	 * @return \DateTime|null
	 */
	public function getCancelled()
	{
		return $this->cancelled;
	}

	/**
	 * @param \DateTime|null $cancelled
	 * @return $this
	 */
	public function cancelled(\DateTime $cancelled = null)
	{
		$this->cancelled = $cancelled;
		return $this;
	}

	/**
	 * @return int|null
	 */
	public function getTicketId()
	{
		return $this->ticketId;
	}

	/**
	 * @param int|null $ticketId
	 * @return $this
	 */
	public function ticketId(int $ticketId = null)
	{
		$this->ticketId = $ticketId;
		return $this;
	}

	/**
	 * @return int|null
	 */
	public function getSupplierId()
	{
		return $this->supplierId;
	}

	/**
	 * @param int|null $supplierId
	 * @return $this
	 */
	public function supplierId(int $supplierId = null)
	{
		$this->supplierId = $supplierId;
		return $this;
	}

	/**
	 * @return int|null
	 */
	public function getFeedId()
	{
		return $this->feedId;
	}

	/**
	 * @param int|null $feedId
	 * @return $this
	 */
	public function feedId(int $feedId = null)
	{
		$this->feedId = $feedId;
		return $this;
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
	 * @return $this
	 */
	public function status(\Sellastica\CatalogSupplier\Model\InquiryStatus $status)
	{
		$this->status = $status;
		return $this;
	}

	/**
	 * @return float|null
	 */
	public function getPrice()
	{
		return $this->price;
	}

	/**
	 * @param float|null $price
	 * @return $this
	 */
	public function price(float $price = null)
	{
		$this->price = $price;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function generateId(): bool
	{
		return !SupplierInquiry::isIdGeneratedByStorage();
	}

	/**
	 * @return SupplierInquiry
	 */
	public function build(): SupplierInquiry
	{
		return new SupplierInquiry($this);
	}

	/**
	 * @param \Sellastica\Identity\Model\Contact $contact
	 * @param string $supplier
	 * @return self
	 */
	public static function create(
		\Sellastica\Identity\Model\Contact $contact,
		string $supplier
	): self
	{
		return new self($contact, $supplier);
	}
}