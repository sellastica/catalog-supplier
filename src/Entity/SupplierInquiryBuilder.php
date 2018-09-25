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
	/** @var string|null */
	private $supplierHomepage;
	/** @var string|null */
	private $supplierEmail;
	/** @var string|null */
	private $supplierPhone;
	/** @var string|null */
	private $feedUrl;
	/** @var string|null */
	private $note;
	/** @var bool */
	private $confirmed = false;
	/** @var bool */
	private $closed = false;
	/** @var int|null */
	private $ticketId;

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
	 * @return bool
	 */
	public function getConfirmed(): bool
	{
		return $this->confirmed;
	}

	/**
	 * @param bool $confirmed
	 * @return $this
	 */
	public function confirmed(bool $confirmed)
	{
		$this->confirmed = $confirmed;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function getClosed(): bool
	{
		return $this->closed;
	}

	/**
	 * @param bool $closed
	 * @return $this
	 */
	public function closed(bool $closed)
	{
		$this->closed = $closed;
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