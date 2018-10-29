<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\IBuilder;
use Sellastica\Entity\TBuilder;

/**
 * @see InstalledCatalogApplication
 */
class InstalledCatalogApplicationBuilder implements IBuilder
{
	use TBuilder;

	/** @var int */
	private $applicationId;
	/** @var int */
	private $catalogFeedId;
	/** @var int */
	private $projectId;
	/** @var array */
	private $options = [];

	/**
	 * @param int $applicationId
	 * @param int $catalogFeedId
	 * @param int $projectId
	 */
	public function __construct(
		int $applicationId,
		int $catalogFeedId,
		int $projectId
	)
	{
		$this->applicationId = $applicationId;
		$this->catalogFeedId = $catalogFeedId;
		$this->projectId = $projectId;
	}

	/**
	 * @return int
	 */
	public function getApplicationId(): int
	{
		return $this->applicationId;
	}

	/**
	 * @return int
	 */
	public function getCatalogFeedId(): int
	{
		return $this->catalogFeedId;
	}

	/**
	 * @return int
	 */
	public function getProjectId(): int
	{
		return $this->projectId;
	}

	/**
	 * @return array
	 */
	public function getOptions(): array
	{
		return $this->options;
	}

	/**
	 * @param array $options
	 * @return $this
	 */
	public function options(array $options)
	{
		$this->options = $options;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function generateId(): bool
	{
		return !InstalledCatalogApplication::isIdGeneratedByStorage();
	}

	/**
	 * @return InstalledCatalogApplication
	 */
	public function build(): InstalledCatalogApplication
	{
		return new InstalledCatalogApplication($this);
	}

	/**
	 * @param int $applicationId
	 * @param int $catalogFeedId
	 * @param int $projectId
	 * @return self
	 */
	public static function create(
		int $applicationId,
		int $catalogFeedId,
		int $projectId
	): self
	{
		return new self($applicationId, $catalogFeedId, $projectId);
	}
}