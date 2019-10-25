<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\IBuilder;
use Sellastica\Entity\TBuilder;

/**
 * @see SupplierOrder
 */
class SupplierOrderBuilder implements IBuilder
{
	use TBuilder;

	/** @var int|null */
	private $projectId;
	/** @var int|null */
	private $adminUserId;
	/** @var string|null */
	private $feedUrl;
	/** @var string|null */
	private $login;
	/** @var string|null */
	private $password;
	/** @var string|null */
	private $note;
	/** @var \DateTime|null */
	private $deadline;
	/** @var int|null */
	private $ticketId;
	/** @var int|null */
	private $feedId;
	/** @var int|null */
	private $invoiceId;
	/** @var \Sellastica\CatalogSupplier\Model\OrderStatus */
	private $status;
	/** @var \DateTime|null */
	private $closed;
	/** @var \DateTime|null */
	private $cancelled;

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
	 * @return int|null
	 */
	public function getInvoiceId()
	{
		return $this->invoiceId;
	}

	/**
	 * @param int|null $invoiceId
	 * @return $this
	 */
	public function invoiceId(int $invoiceId = null)
	{
		$this->invoiceId = $invoiceId;
		return $this;
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
	 * @return $this
	 */
	public function status(\Sellastica\CatalogSupplier\Model\OrderStatus $status)
	{
		$this->status = $status;
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
	 * @return bool
	 */
	public function generateId(): bool
	{
		return !SupplierOrder::isIdGeneratedByStorage();
	}

	/**
	 * @return SupplierOrder
	 */
	public function build(): SupplierOrder
	{
		return new SupplierOrder($this);
	}

	/**
	 * @return self
	 */
	public static function create(): self
	{
		return new self();
	}
}