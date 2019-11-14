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

	/** @var int @required */
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
	/** @var bool @optional */
	private $regular = true;
	/** @var \DateTime|null @optional */
	private $closed;
	/** @var int|null @optional */
	private $ticketId;


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
				'regular' => $this->regular,
				'closed' => $this->closed,
				'ticketId' => $this->ticketId,
			]
		);
	}
}