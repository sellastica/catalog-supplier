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
	private $productsCount;
	/** @var bool */
	private $supplierDownload;
	/** @var int|null */
	private $supplierId;
	/** @var int|null */
	private $feedId;
	/** @var string|null */
	private $url;

	/**
	 * @param int $projectId
	 * @param int $productsCount
	 * @param bool $supplierDownload
	 */
	public function __construct(
		int $projectId,
		int $productsCount,
		bool $supplierDownload
	)
	{
		$this->projectId = $projectId;
		$this->productsCount = $productsCount;
		$this->supplierDownload = $supplierDownload;
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
	 * @return int|null
	 */
	public function getSupplierId()
	{
		return $this->supplierId;
	}

	/**
	 * @param int|null $supplierId
	 * @return $this
	 */
	public function supplierId(int $supplierId = null)
	{
		$this->supplierId = $supplierId;
		return $this;
	}

	/**
	 * @return int|null
	 */
	public function getFeedId()
	{
		return $this->feedId;
	}

	/**
	 * @param int|null $feedId
	 * @return $this
	 */
	public function feedId(int $feedId = null)
	{
		$this->feedId = $feedId;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getUrl()
	{
		return $this->url;
	}

	/**
	 * @param string|null $url
	 * @return $this
	 */
	public function url(string $url = null)
	{
		$this->url = $url;
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
	 * @param int $productsCount
	 * @param bool $supplierDownload
	 * @return self
	 */
	public static function create(
		int $projectId,
		int $productsCount,
		bool $supplierDownload
	): self
	{
		return new self($projectId, $productsCount, $supplierDownload);
	}
}