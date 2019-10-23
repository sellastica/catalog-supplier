<?php
namespace Sellastica\CatalogSupplier\Entity;

/**
 * @generate-builder
 * @see ProjectFeedLogBuilder
 *
 * @property ProjectFeedLogRelations $relationService
 */
class ProjectFeedLog extends \Sellastica\Entity\Entity\AbstractEntity
	implements \Sellastica\Entity\Entity\IEntity
{
	use \Sellastica\Entity\Entity\TAbstractEntity;

	/** @var int @required */
	private $projectId;
	/** @var int @required */
	private $catalogFeedId;
	/** @var \DateTime @required */
	private $date;
	/** @var int @optional */
	private $activeProductsCount;
	/** @var int @optional */
	private $activeVariantsCount;
	/** @var int @optional */
	private $approvedProductsCount = 0;
	/** @var int @optional */
	private $approvedVariantsCount = 0;
	/** @var int @optional */
	private $pendingProductsCount = 0;
	/** @var int @optional */
	private $pendingVariantsCount = 0;
	/** @var int @optional */
	private $hiddenProductsCount = 0;
	/** @var int @optional */
	private $hiddenVariantsCount = 0;
	/** @var int @optional */
	private $totalProductsCount = 0;
	/** @var int @optional */
	private $totalVariantsCount = 0;
	/** @var bool @optional */
	private $trial = false;


	/**
	 * @param ProjectFeedLogBuilder $builder
	 */
	public function __construct(ProjectFeedLogBuilder $builder)
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
	 * @return \DateTime
	 */
	public function getDate(): \DateTime
	{
		return $this->date;
	}

	/**
	 * @param \DateTime $date
	 */
	public function setDate(\DateTime $date): void
	{
		$this->date = $date;
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
	 */
	public function setActiveProductsCount(int $activeProductsCount): void
	{
		$this->activeProductsCount = $activeProductsCount;
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
	 */
	public function setActiveVariantsCount(int $activeVariantsCount): void
	{
		$this->activeVariantsCount = $activeVariantsCount;
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
	 */
	public function setApprovedProductsCount(int $approvedProductsCount): void
	{
		$this->approvedProductsCount = $approvedProductsCount;
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
	 */
	public function setApprovedVariantsCount(int $approvedVariantsCount): void
	{
		$this->approvedVariantsCount = $approvedVariantsCount;
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
	 */
	public function setPendingProductsCount(int $pendingProductsCount): void
	{
		$this->pendingProductsCount = $pendingProductsCount;
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
	 */
	public function setPendingVariantsCount(int $pendingVariantsCount): void
	{
		$this->pendingVariantsCount = $pendingVariantsCount;
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
	 */
	public function setHiddenProductsCount(int $hiddenProductsCount): void
	{
		$this->hiddenProductsCount = $hiddenProductsCount;
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
	 */
	public function setHiddenVariantsCount(int $hiddenVariantsCount): void
	{
		$this->hiddenVariantsCount = $hiddenVariantsCount;
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
	 */
	public function setTotalProductsCount(int $totalProductsCount): void
	{
		$this->totalProductsCount = $totalProductsCount;
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
	 */
	public function setTotalVariantsCount(int $totalVariantsCount): void
	{
		$this->totalVariantsCount = $totalVariantsCount;
	}

	/**
	 * @return bool
	 */
	public function isTrial(): bool
	{
		return $this->trial;
	}

	/**
	 * @param bool $trial
	 */
	public function setTrial(bool $trial): void
	{
		$this->trial = $trial;
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
				'catalogFeedId' => $this->catalogFeedId,
				'date' => $this->date,
				'activeProductsCount' => $this->activeProductsCount,
				'activeVariantsCount' => $this->activeVariantsCount,
				'approvedProductsCount' => $this->approvedProductsCount,
				'approvedVariantsCount' => $this->approvedVariantsCount,
				'pendingProductsCount' => $this->pendingProductsCount,
				'pendingVariantsCount' => $this->pendingVariantsCount,
				'hiddenProductsCount' => $this->hiddenProductsCount,
				'hiddenVariantsCount' => $this->hiddenVariantsCount,
				'totalProductsCount' => $this->totalProductsCount,
				'totalVariantsCount' => $this->totalVariantsCount,
				'trial' => $this->trial,
			]
		);
	}
}