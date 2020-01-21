<?php
namespace Sellastica\CatalogSupplier\Entity;

/**
 * @generate-builder
 * @see OfferBuilder
 *
 * @property OfferRelations $relationService
 */
class Offer extends \Sellastica\Entity\Entity\AbstractEntity
	implements \Sellastica\Entity\Entity\IEntity
{
	use \Sellastica\Entity\Entity\TAbstractEntity;

	/** @var string|null @optional */
	private $title;
	/** @var int|null @optional */
	private $projectId;
	/** @var int|null @optional */
	private $inquiryId;
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
	/** @var int|null @optional */
	private $ticketId;
	/** @var int|null @optional */
	private $feedId;
	/** @var int|null @optional */
	private $productsCount;
	/** @var int|null @optional */
	private $variantsCount;
	/** @var \Sellastica\Price\Price @optional */
	private $price;
	/** @var bool @optional */
	private $regular = true;
	/** @var \Sellastica\CatalogSupplier\Model\OfferStatus @optional */
	private $status;
	/** @var \DateTime|null @optional */
	private $statusChanged;
	/** @var string|null @optional */
	private $rejectReason;


	/**
	 * @param OfferBuilder $builder
	 */
	public function __construct(OfferBuilder $builder)
	{
		$this->hydrate($builder);
		$this->status = $this->status ?? \Sellastica\CatalogSupplier\Model\OfferStatus::new();
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
	 * @return string|null
	 */
	public function getTitle(): ?string
	{
		return $this->title;
	}

	/**
	 * @param string|null $title
	 */
	public function setTitle(?string $title): void
	{
		$this->title = $title;
	}

	/**
	 * @return string
	 */
	public function getResolvedTitle(): string
	{
		if (isset($this->title)) {
			return $this->title;
		} else {
			return $this->getFeedDomain()
				? \Nette\Utils\Strings::firstUpper($this->getFeedDomain())
				: $this->getNumber();
		}
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
	public function getInquiryId(): ?int
	{
		return $this->inquiryId;
	}

	/**
	 * @param int|null $inquiryId
	 */
	public function setInquiryId(?int $inquiryId): void
	{
		$this->inquiryId = $inquiryId;
	}

	/**
	 * @return SupplierInquiry|null
	 */
	public function getInquiry(): ?SupplierInquiry
	{
		return $this->relationService->getInquiry();
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
	 * @return \Sellastica\Integroid\Entity\IntegroidUser|null
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
	 * @return int
	 */
	public function getAdditionalFeedsCount(): int
	{
		$count = 0;
		for ($i = 1; $i <= 5; $i++) {
			if ($this->{"additionalFeedUrl$i"}) {
				$count++;
			}
		}

		return $count;
	}

	/**
	 * @return int
	 */
	public function getFeedsCount(): int
	{
		return $this->getAdditionalFeedsCount() + 1;
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
	 * @return int|null
	 */
	public function getProductsCount(): ?int
	{
		return $this->productsCount;
	}

	/**
	 * @param int|null $productsCount
	 */
	public function setProductsCount(?int $productsCount): void
	{
		$this->productsCount = $productsCount;
	}

	/**
	 * @return int|null
	 */
	public function getVariantsCount(): ?int
	{
		return $this->variantsCount;
	}

	/**
	 * @param int|null $variantsCount
	 */
	public function setVariantsCount(?int $variantsCount): void
	{
		$this->variantsCount = $variantsCount;
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
	 * @return \Sellastica\CatalogSupplier\Model\OfferStatus
	 */
	public function getStatus(): \Sellastica\CatalogSupplier\Model\OfferStatus
	{
		return $this->status;
	}

	/**
	 * @param \Sellastica\CatalogSupplier\Model\OfferStatus $status
	 */
	public function setStatus(\Sellastica\CatalogSupplier\Model\OfferStatus $status): void
	{
		$this->status = $status;
	}

	/**
	 * @return \DateTime|null
	 */
	public function getStatusChanged(): ?\DateTime
	{
		return $this->statusChanged;
	}

	/**
	 * @param \DateTime|null $statusChanged
	 */
	public function setStatusChanged(?\DateTime $statusChanged): void
	{
		$this->statusChanged = $statusChanged;
	}

	/**
	 * @return string
	 */
	public function getUrl(): string
	{
		return sprintf(
			'https://klient.napojse.cz/%s',
			$this->getRelativeUrl()
		);
	}

	/**
	 * @return string
	 */
	public function getRelativeUrl(): string
	{
		return sprintf(
			'offers/%s/%s',
			$this->getCreated()->getTimestamp(),
			$this->id
		);
	}

	/**
	 * @return string|null
	 */
	public function getRejectReason(): ?string
	{
		return $this->rejectReason;
	}

	/**
	 * @param string|null $rejectReason
	 */
	public function setRejectReason(?string $rejectReason): void
	{
		$this->rejectReason = $rejectReason;
	}

	/**
	 * @return array
	 */
	public function toArray(): array
	{
		return array_merge(
			$this->parentToArray(),
			[
				'title' => $this->title,
				'projectId' => $this->projectId,
				'inquiryId' => $this->inquiryId,
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
				'ticketId' => $this->ticketId,
				'productsCount' => $this->productsCount,
				'variantsCount' => $this->variantsCount,
				'price' => $this->price->getWithoutTax(),
				'currency' => $this->price->getCurrency()->getCode(),
				'regular' => $this->regular,
				'feedId' => $this->feedId,
				'status' => $this->status->getValue(),
				'statusChanged' => $this->statusChanged,
				'rejectReason' => $this->rejectReason,
			]
		);
	}
}