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

	/** @var int */
	private $projectId;
	/** @var \Sellastica\Price\Price */
	private $price;
	/** @var int|null */
	private $offerId;
	/** @var int|null */
	private $adminUserId;
	/** @var string|null */
	private $feedUrl;
	/** @var string|null */
	private $additionalFeedUrl1;
	/** @var string|null */
	private $additionalFeedUrl2;
	/** @var string|null */
	private $additionalFeedUrl3;
	/** @var string|null */
	private $additionalFeedUrl4;
	/** @var string|null */
	private $additionalFeedUrl5;
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
	/** @var bool */
	private $regular = true;
	/** @var \DateTime|null */
	private $closed;
	/** @var \DateTime|null */
	private $cancelled;
	/** @var \DateTime|null */
	private $sent;
	/** @var string|null */
	private $sentToEmail;
	/** @var bool */
	private $supportNotified = false;

	/**
	 * @param int $projectId
	 * @param \Sellastica\Price\Price $price
	 */
	public function __construct(
		int $projectId,
		\Sellastica\Price\Price $price
	)
	{
		$this->projectId = $projectId;
		$this->price = $price;
	}

	/**
	 * @return int
	 */
	public function getProjectId(): int
	{
		return $this->projectId;
	}

	/**
	 * @return \Sellastica\Price\Price
	 */
	public function getPrice(): \Sellastica\Price\Price
	{
		return $this->price;
	}

	/**
	 * @return int|null
	 */
	public function getOfferId()
	{
		return $this->offerId;
	}

	/**
	 * @param int|null $offerId
	 * @return $this
	 */
	public function offerId(int $offerId = null)
	{
		$this->offerId = $offerId;
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
	public function getAdditionalFeedUrl1()
	{
		return $this->additionalFeedUrl1;
	}

	/**
	 * @param string|null $additionalFeedUrl1
	 * @return $this
	 */
	public function additionalFeedUrl1(string $additionalFeedUrl1 = null)
	{
		$this->additionalFeedUrl1 = $additionalFeedUrl1;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getAdditionalFeedUrl2()
	{
		return $this->additionalFeedUrl2;
	}

	/**
	 * @param string|null $additionalFeedUrl2
	 * @return $this
	 */
	public function additionalFeedUrl2(string $additionalFeedUrl2 = null)
	{
		$this->additionalFeedUrl2 = $additionalFeedUrl2;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getAdditionalFeedUrl3()
	{
		return $this->additionalFeedUrl3;
	}

	/**
	 * @param string|null $additionalFeedUrl3
	 * @return $this
	 */
	public function additionalFeedUrl3(string $additionalFeedUrl3 = null)
	{
		$this->additionalFeedUrl3 = $additionalFeedUrl3;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getAdditionalFeedUrl4()
	{
		return $this->additionalFeedUrl4;
	}

	/**
	 * @param string|null $additionalFeedUrl4
	 * @return $this
	 */
	public function additionalFeedUrl4(string $additionalFeedUrl4 = null)
	{
		$this->additionalFeedUrl4 = $additionalFeedUrl4;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getAdditionalFeedUrl5()
	{
		return $this->additionalFeedUrl5;
	}

	/**
	 * @param string|null $additionalFeedUrl5
	 * @return $this
	 */
	public function additionalFeedUrl5(string $additionalFeedUrl5 = null)
	{
		$this->additionalFeedUrl5 = $additionalFeedUrl5;
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
	 * @return bool
	 */
	public function getRegular(): bool
	{
		return $this->regular;
	}

	/**
	 * @param bool $regular
	 * @return $this
	 */
	public function regular(bool $regular = true)
	{
		$this->regular = $regular;
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
	 * @return \DateTime|null
	 */
	public function getSent()
	{
		return $this->sent;
	}

	/**
	 * @param \DateTime|null $sent
	 * @return $this
	 */
	public function sent(\DateTime $sent = null)
	{
		$this->sent = $sent;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getSentToEmail()
	{
		return $this->sentToEmail;
	}

	/**
	 * @param string|null $sentToEmail
	 * @return $this
	 */
	public function sentToEmail(string $sentToEmail = null)
	{
		$this->sentToEmail = $sentToEmail;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function getSupportNotified(): bool
	{
		return $this->supportNotified;
	}

	/**
	 * @param bool $supportNotified
	 * @return $this
	 */
	public function supportNotified(bool $supportNotified)
	{
		$this->supportNotified = $supportNotified;
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
	 * @param int $projectId
	 * @param \Sellastica\Price\Price $price
	 * @return self
	 */
	public static function create(
		int $projectId,
		\Sellastica\Price\Price $price
	): self
	{
		return new self($projectId, $price);
	}
}