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
	/** @var int @required */
	private $productsCount;
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
	public function getProductsCount(): int
	{
		return $this->productsCount;
	}

	/**
	 * @param int $productsCount
	 */
	public function setProductsCount(int $productsCount): void
	{
		$this->productsCount = $productsCount;
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
				'productsCount' => $this->productsCount,
				'trial' => $this->trial,
			]
		);
	}
}