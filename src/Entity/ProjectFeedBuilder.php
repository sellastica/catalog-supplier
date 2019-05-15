<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\IBuilder;
use Sellastica\Entity\TBuilder;

/**
 * @see ProjectFeed
 */
class ProjectFeedBuilder implements IBuilder
{
	use TBuilder;

	/** @var int */
	private $projectId;
	/** @var string */
	private $feedId;
	/** @var int */
	private $catalogFeedId;
	/** @var \DateTime|null */
	private $trialTill;
	/** @var \DateTime|null */
	private $lastSupplierDownload;
	/** @var \DateTime|null */
	private $lastNapojseDownload;
	/** @var \DateTime|null */
	private $ordered;
	/** @var \DateTime|null */
	private $removed;
	/** @var \Suppliers\Entity\Feed\Model\FeedStatistics|null */
	private $statistics;

	/**
	 * @param int $projectId
	 * @param string $feedId
	 * @param int $catalogFeedId
	 */
	public function __construct(
		int $projectId,
		string $feedId,
		int $catalogFeedId
	)
	{
		$this->projectId = $projectId;
		$this->feedId = $feedId;
		$this->catalogFeedId = $catalogFeedId;
	}

	/**
	 * @return int
	 */
	public function getProjectId(): int
	{
		return $this->projectId;
	}

	/**
	 * @return string
	 */
	public function getFeedId(): string
	{
		return $this->feedId;
	}

	/**
	 * @return int
	 */
	public function getCatalogFeedId(): int
	{
		return $this->catalogFeedId;
	}

	/**
	 * @return \DateTime|null
	 */
	public function getTrialTill()
	{
		return $this->trialTill;
	}

	/**
	 * @param \DateTime|null $trialTill
	 * @return $this
	 */
	public function trialTill(\DateTime $trialTill = null)
	{
		$this->trialTill = $trialTill;
		return $this;
	}

	/**
	 * @return \DateTime|null
	 */
	public function getLastSupplierDownload()
	{
		return $this->lastSupplierDownload;
	}

	/**
	 * @param \DateTime|null $lastSupplierDownload
	 * @return $this
	 */
	public function lastSupplierDownload(\DateTime $lastSupplierDownload = null)
	{
		$this->lastSupplierDownload = $lastSupplierDownload;
		return $this;
	}

	/**
	 * @return \DateTime|null
	 */
	public function getLastNapojseDownload()
	{
		return $this->lastNapojseDownload;
	}

	/**
	 * @param \DateTime|null $lastNapojseDownload
	 * @return $this
	 */
	public function lastNapojseDownload(\DateTime $lastNapojseDownload = null)
	{
		$this->lastNapojseDownload = $lastNapojseDownload;
		return $this;
	}

	/**
	 * @return \DateTime|null
	 */
	public function getOrdered()
	{
		return $this->ordered;
	}

	/**
	 * @param \DateTime|null $ordered
	 * @return $this
	 */
	public function ordered(\DateTime $ordered = null)
	{
		$this->ordered = $ordered;
		return $this;
	}

	/**
	 * @return \DateTime|null
	 */
	public function getRemoved()
	{
		return $this->removed;
	}

	/**
	 * @param \DateTime|null $removed
	 * @return $this
	 */
	public function removed(\DateTime $removed = null)
	{
		$this->removed = $removed;
		return $this;
	}

	/**
	 * @return \Suppliers\Entity\Feed\Model\FeedStatistics|null
	 */
	public function getStatistics()
	{
		return $this->statistics;
	}

	/**
	 * @param \Suppliers\Entity\Feed\Model\FeedStatistics|null $statistics
	 * @return $this
	 */
	public function statistics(\Suppliers\Entity\Feed\Model\FeedStatistics $statistics = null)
	{
		$this->statistics = $statistics;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function generateId(): bool
	{
		return !ProjectFeed::isIdGeneratedByStorage();
	}

	/**
	 * @return ProjectFeed
	 */
	public function build(): ProjectFeed
	{
		return new ProjectFeed($this);
	}

	/**
	 * @param int $projectId
	 * @param string $feedId
	 * @param int $catalogFeedId
	 * @return self
	 */
	public static function create(
		int $projectId,
		string $feedId,
		int $catalogFeedId
	): self
	{
		return new self($projectId, $feedId, $catalogFeedId);
	}
}