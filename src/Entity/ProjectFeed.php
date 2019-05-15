<?php
namespace Sellastica\CatalogSupplier\Entity;

/**
 * @generate-builder
 * @see ProjectFeedBuilder
 *
 * @property ProjectFeedRelations $relationService
 */
class ProjectFeed extends \Sellastica\Entity\Entity\AbstractEntity
	implements \Sellastica\Entity\Entity\IEntity
{
	use \Sellastica\Entity\Entity\TAbstractEntity;

	/** @var int @required */
	private $projectId;
	/** @var string @required */
	private $feedId;
	/** @var int @required */
	private $catalogFeedId;
	/** @var \DateTime|null @optional */
	private $trialTill;
	/** @var \DateTime|null @optional */
	private $lastSupplierDownload;
	/** @var \DateTime|null @optional */
	private $lastNapojseDownload;
	/** @var \DateTime|null @optional */
	private $ordered;
	/** @var \DateTime|null @optional */
	private $removed;
	/** @var \Sellastica\CatalogSupplier\Model\FeedStatistics|null @optional */
	private $statistics;


	/**
	 * @param ProjectFeedBuilder $builder
	 */
	public function __construct(ProjectFeedBuilder $builder)
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
	 * @return int
	 */
	public function getProjectId(): int
	{
		return $this->projectId;
	}

	/**
	 * @return \Sellastica\Project\Entity\Project
	 */
	public function getProject(): \Sellastica\Project\Entity\Project
	{
		return $this->relationService->getProject();
	}

	/**
	 * @param int $projectId
	 */
	public function setProjectId(int $projectId): void
	{
		$this->projectId = $projectId;
	}

	/**
	 * @return string
	 */
	public function getFeedId(): string
	{
		return $this->feedId;
	}

	/**
	 * @param string $feedId
	 */
	public function setFeedId(string $feedId): void
	{
		$this->feedId = $feedId;
	}

	/**
	 * @return int
	 */
	public function getCatalogFeedId(): int
	{
		return $this->catalogFeedId;
	}

	/**
	 * @return CatalogFeed|null
	 */
	public function getCatalogFeed(): ?CatalogFeed
	{
		return $this->relationService->getCatalogFeed();
	}

	/**
	 * @param int $catalogFeedId
	 */
	public function setCatalogFeedId(int $catalogFeedId): void
	{
		$this->catalogFeedId = $catalogFeedId;
	}

	/**
	 * @return \DateTime|null
	 */
	public function getLastSupplierDownload(): ?\DateTime
	{
		return $this->lastSupplierDownload;
	}

	/**
	 * @param \DateTime|null $lastSupplierDownload
	 */
	public function setLastSupplierDownload(?\DateTime $lastSupplierDownload): void
	{
		$this->lastSupplierDownload = $lastSupplierDownload;
	}

	/**
	 * @return \DateTime|null
	 */
	public function getLastNapojseDownload(): ?\DateTime
	{
		return $this->lastNapojseDownload;
	}

	/**
	 * @param \DateTime|null $lastNapojseDownload
	 */
	public function setLastNapojseDownload(?\DateTime $lastNapojseDownload): void
	{
		$this->lastNapojseDownload = $lastNapojseDownload;
	}

	/**
	 * @return \DateTime|null
	 */
	public function getRemoved(): ?\DateTime
	{
		return $this->removed;
	}

	/**
	 * @param \DateTime|null $removed
	 */
	public function setRemoved(?\DateTime $removed): void
	{
		$this->removed = $removed;
	}

	/**
	 * @return \DateTime|null
	 */
	public function getOrdered(): ?\DateTime
	{
		return $this->ordered;
	}

	/**
	 * @param \DateTime|null $ordered
	 */
	public function setOrdered(?\DateTime $ordered): void
	{
		$this->ordered = $ordered;
	}

	/**
	 * @return \DateTime|null
	 */
	public function getTrialTill(): ?\DateTime
	{
		return $this->trialTill;
	}

	/**
	 * @param \DateTime|null $trialTill
	 */
	public function setTrialTill(?\DateTime $trialTill): void
	{
		$this->trialTill = $trialTill;
		$this->trialTill->setTime(0, 0, 0);
	}

	/**
	 * @return bool
	 */
	public function isTrial(): bool
	{
		if (!isset($this->trialTill)) {
			return true;
		} else {
			return $this->trialTill >= new \DateTime('today midnight');
		}
	}

	/**
	 * @return int
	 */
	public function getTrialDaysLeft(): int
	{
		$today = new \DateTime('today midnight');
		if (!isset($this->trialTill)
			|| $this->trialTill <= $today) {
			return 0;
		} else {
			return (int)$this->trialTill->diff($today)->format('%a') + 1;
		}
	}

	/**
	 * @return bool
	 */
	public function isTrialExpired(): bool
	{
		return $this->getTrialDaysLeft() === 0;
	}

	/**
	 * @return \Sellastica\CatalogSupplier\Model\FeedStatistics|null
	 */
	public function getStatistics(): ?\Sellastica\CatalogSupplier\Model\FeedStatistics
	{
		return $this->statistics;
	}

	/**
	 * @param \Sellastica\CatalogSupplier\Model\FeedStatistics|null $statistics
	 */
	public function setStatistics(?\Sellastica\CatalogSupplier\Model\FeedStatistics $statistics): void
	{
		$this->statistics = $statistics;
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
				'feedId' => $this->feedId,
				'catalogFeedId' => $this->catalogFeedId,
				'statistics' => $this->statistics && $this->statistics->getProductsCount()
					? \Nette\Utils\Json::encode($this->statistics->toArray())
					: null,
				'lastSupplierDownload' => $this->lastSupplierDownload,
				'lastNapojseDownload' => $this->lastNapojseDownload,
				'trialTill' => $this->trialTill,
				'ordered' => $this->ordered,
				'removed' => $this->removed,
			]
		);
	}
}