<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\IBuilder;
use Sellastica\Entity\TBuilder;

/**
 * @see CatalogFeedProject
 */
class CatalogFeedProjectBuilder implements IBuilder
{
	use TBuilder;

	/** @var int */
	private $projectId;
	/** @var int */
	private $supplierId;
	/** @var int */
	private $feedId;
	/** @var int */
	private $productsCount;
	/** @var bool */
	private $supplierDownload = false;

	/**
	 * @param int $projectId
	 * @param int $supplierId
	 * @param int $feedId
	 * @param int $productsCount
	 */
	public function __construct(
		int $projectId,
		int $supplierId,
		int $feedId,
		int $productsCount
	)
	{
		$this->projectId = $projectId;
		$this->supplierId = $supplierId;
		$this->feedId = $feedId;
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
	public function getSupplierId(): int
	{
		return $this->supplierId;
	}

	/**
	 * @return int
	 */
	public function getFeedId(): int
	{
		return $this->feedId;
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
	public function getSupplierDownload(): bool
	{
		return $this->supplierDownload;
	}

	/**
	 * @param bool $supplierDownload
	 * @return $this
	 */
	public function supplierDownload(bool $supplierDownload)
	{
		$this->supplierDownload = $supplierDownload;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function generateId(): bool
	{
		return !CatalogFeedProject::isIdGeneratedByStorage();
	}

	/**
	 * @return CatalogFeedProject
	 */
	public function build(): CatalogFeedProject
	{
		return new CatalogFeedProject($this);
	}

	/**
	 * @param int $projectId
	 * @param int $supplierId
	 * @param int $feedId
	 * @param int $productsCount
	 * @return self
	 */
	public static function create(
		int $projectId,
		int $supplierId,
		int $feedId,
		int $productsCount
	): self
	{
		return new self($projectId, $supplierId, $feedId, $productsCount);
	}
}