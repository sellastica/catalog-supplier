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
	private $productsCount;
	/** @var int */
	private $approvedProductsCount = 0;
	/** @var int */
	private $hiddenProductsCount = 0;
	/** @var int */
	private $totalProductsCount = 0;
	/** @var bool */
	private $trial = false;

	/**
	 * @param int $projectId
	 * @param int $catalogFeedId
	 * @param \DateTime $date
	 * @param int $productsCount
	 */
	public function __construct(
		int $projectId,
		int $catalogFeedId,
		\DateTime $date,
		int $productsCount
	)
	{
		$this->projectId = $projectId;
		$this->catalogFeedId = $catalogFeedId;
		$this->date = $date;
		$this->productsCount = $productsCount;
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
	public function getProductsCount(): int
	{
		return $this->productsCount;
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
	 * @param int $productsCount
	 * @return self
	 */
	public static function create(
		int $projectId,
		int $catalogFeedId,
		\DateTime $date,
		int $productsCount
	): self
	{
		return new self($projectId, $catalogFeedId, $date, $productsCount);
	}
}