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