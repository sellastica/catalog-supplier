<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\IBuilder;
use Sellastica\Entity\TBuilder;

/**
 * @see ProjectFeedLog
 */
class ProjectFeedLogBuilder implements IBuilder
{
	use TBuilder;

	/** @var int */
	private $projectId;
	/** @var int */
	private $catalogFeedId;
	/** @var \DateTime */
	private $date;
	/** @var int */
	private $activeProductsCount;
	/** @var int */
	private $activeVariantsCount;
	/** @var int */
	private $approvedProductsCount = 0;
	/** @var int */
	private $approvedVariantsCount = 0;
	/** @var int */
	private $pendingProductsCount = 0;
	/** @var int */
	private $pendingVariantsCount = 0;
	/** @var int */
	private $hiddenProductsCount = 0;
	/** @var int */
	private $hiddenVariantsCount = 0;
	/** @var int */
	private $totalProductsCount = 0;
	/** @var int */
	private $totalVariantsCount = 0;
	/** @var bool */
	private $trial = false;

	/**
	 * @param int $projectId
	 * @param int $catalogFeedId
	 * @param \DateTime $date
	 */
	public function __construct(
		int $projectId,
		int $catalogFeedId,
		\DateTime $date
	)
	{
		$this->projectId = $projectId;
		$this->catalogFeedId = $catalogFeedId;
		$this->date = $date;
	}

	/**
	 * @return int
	 */
	public function getProjectId(): int
	{
		return $this->projectId;
	}

	/**
	 * @return int
	 */
	public function getCatalogFeedId(): int
	{
		return $this->catalogFeedId;
	}

	/**
	 * @return \DateTime
	 */
	public function getDate(): \DateTime
	{
		return $this->date;
	}

	/**
	 * @return int
	 */
	public function getActiveProductsCount(): int
	{
		return $this->activeProductsCount;
	}

	/**
	 * @param int $activeProductsCount
	 * @return $this
	 */
	public function activeProductsCount(int $activeProductsCount)
	{
		$this->activeProductsCount = $activeProductsCount;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getActiveVariantsCount(): int
	{
		return $this->activeVariantsCount;
	}

	/**
	 * @param int $activeVariantsCount
	 * @return $this
	 */
	public function activeVariantsCount(int $activeVariantsCount)
	{
		$this->activeVariantsCount = $activeVariantsCount;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getApprovedProductsCount(): int
	{
		return $this->approvedProductsCount;
	}

	/**
	 * @param int $approvedProductsCount
	 * @return $this
	 */
	public function approvedProductsCount(int $approvedProductsCount)
	{
		$this->approvedProductsCount = $approvedProductsCount;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getApprovedVariantsCount(): int
	{
		return $this->approvedVariantsCount;
	}

	/**
	 * @param int $approvedVariantsCount
	 * @return $this
	 */
	public function approvedVariantsCount(int $approvedVariantsCount)
	{
		$this->approvedVariantsCount = $approvedVariantsCount;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getPendingProductsCount(): int
	{
		return $this->pendingProductsCount;
	}

	/**
	 * @param int $pendingProductsCount
	 * @return $this
	 */
	public function pendingProductsCount(int $pendingProductsCount)
	{
		$this->pendingProductsCount = $pendingProductsCount;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getPendingVariantsCount(): int
	{
		return $this->pendingVariantsCount;
	}

	/**
	 * @param int $pendingVariantsCount
	 * @return $this
	 */
	public function pendingVariantsCount(int $pendingVariantsCount)
	{
		$this->pendingVariantsCount = $pendingVariantsCount;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getHiddenProductsCount(): int
	{
		return $this->hiddenProductsCount;
	}

	/**
	 * @param int $hiddenProductsCount
	 * @return $this
	 */
	public function hiddenProductsCount(int $hiddenProductsCount)
	{
		$this->hiddenProductsCount = $hiddenProductsCount;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getHiddenVariantsCount(): int
	{
		return $this->hiddenVariantsCount;
	}

	/**
	 * @param int $hiddenVariantsCount
	 * @return $this
	 */
	public function hiddenVariantsCount(int $hiddenVariantsCount)
	{
		$this->hiddenVariantsCount = $hiddenVariantsCount;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getTotalProductsCount(): int
	{
		return $this->totalProductsCount;
	}

	/**
	 * @param int $totalProductsCount
	 * @return $this
	 */
	public function totalProductsCount(int $totalProductsCount)
	{
		$this->totalProductsCount = $totalProductsCount;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getTotalVariantsCount(): int
	{
		return $this->totalVariantsCount;
	}

	/**
	 * @param int $totalVariantsCount
	 * @return $this
	 */
	public function totalVariantsCount(int $totalVariantsCount)
	{
		$this->totalVariantsCount = $totalVariantsCount;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function getTrial(): bool
	{
		return $this->trial;
	}

	/**
	 * @param bool $trial
	 * @return $this
	 */
	public function trial(bool $trial)
	{
		$this->trial = $trial;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function generateId(): bool
	{
		return !ProjectFeedLog::isIdGeneratedByStorage();
	}

	/**
	 * @return ProjectFeedLog
	 */
	public function build(): ProjectFeedLog
	{
		return new ProjectFeedLog($this);
	}

	/**
	 * @param int $projectId
	 * @param int $catalogFeedId
	 * @param \DateTime $date
	 * @return self
	 */
	public static function create(
		int $projectId,
		int $catalogFeedId,
		\DateTime $date
	): self
	{
		return new self($projectId, $catalogFeedId, $date);
	}
}