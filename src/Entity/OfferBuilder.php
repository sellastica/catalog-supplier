<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\IBuilder;
use Sellastica\Entity\TBuilder;

/**
 * @see Offer
 */
class OfferBuilder implements IBuilder
{
	use TBuilder;

	/** @var string|null */
	private $title;
	/** @var int|null */
	private $projectId;
	/** @var int|null */
	private $inquiryId;
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
	/** @var int|null */
	private $ticketId;
	/** @var int|null */
	private $feedId;
	/** @var int|null */
	private $productsCount;
	/** @var int|null */
	private $variantsCount;
	/** @var \Sellastica\Price\Price */
	private $price;
	/** @var bool */
	private $regular = true;
	/** @var \Sellastica\CatalogSupplier\Model\OfferStatus */
	private $status;
	/** @var \DateTime|null */
	private $statusChanged;
	/** @var string|null */
	private $rejectReason;

	/**
	 * @return string|null
	 */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * @param string|null $title
	 * @return $this
	 */
	public function title(string $title = null)
	{
		$this->title = $title;
		return $this;
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
	public function getInquiryId()
	{
		return $this->inquiryId;
	}

	/**
	 * @param int|null $inquiryId
	 * @return $this
	 */
	public function inquiryId(int $inquiryId = null)
	{
		$this->inquiryId = $inquiryId;
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
	public function getProductsCount()
	{
		return $this->productsCount;
	}

	/**
	 * @param int|null $productsCount
	 * @return $this
	 */
	public function productsCount(int $productsCount = null)
	{
		$this->productsCount = $productsCount;
		return $this;
	}

	/**
	 * @return int|null
	 */
	public function getVariantsCount()
	{
		return $this->variantsCount;
	}

	/**
	 * @param int|null $variantsCount
	 * @return $this
	 */
	public function variantsCount(int $variantsCount = null)
	{
		$this->variantsCount = $variantsCount;
		return $this;
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
	 * @return $this
	 */
	public function price(\Sellastica\Price\Price $price)
	{
		$this->price = $price;
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
	 * @return \Sellastica\CatalogSupplier\Model\OfferStatus
	 */
	public function getStatus(): \Sellastica\CatalogSupplier\Model\OfferStatus
	{
		return $this->status;
	}

	/**
	 * @param \Sellastica\CatalogSupplier\Model\OfferStatus $status
	 * @return $this
	 */
	public function status(\Sellastica\CatalogSupplier\Model\OfferStatus $status)
	{
		$this->status = $status;
		return $this;
	}

	/**
	 * @return \DateTime|null
	 */
	public function getStatusChanged()
	{
		return $this->statusChanged;
	}

	/**
	 * @param \DateTime|null $statusChanged
	 * @return $this
	 */
	public function statusChanged(\DateTime $statusChanged = null)
	{
		$this->statusChanged = $statusChanged;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getRejectReason()
	{
		return $this->rejectReason;
	}

	/**
	 * @param string|null $rejectReason
	 * @return $this
	 */
	public function rejectReason(string $rejectReason = null)
	{
		$this->rejectReason = $rejectReason;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function generateId(): bool
	{
		return !Offer::isIdGeneratedByStorage();
	}

	/**
	 * @return Offer
	 */
	public function build(): Offer
	{
		return new Offer($this);
	}

	/**
	 * @return self
	 */
	public static function create(): self
	{
		return new self();
	}
}