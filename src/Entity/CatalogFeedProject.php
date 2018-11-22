<?php
namespace Sellastica\CatalogSupplier\Entity;

/**
 * @generate-builder
 * @see CatalogFeedProjectBuilder
 *
 * @property CatalogFeedProjectRelations $relationService
 */
class CatalogFeedProject extends \Sellastica\Entity\Entity\AbstractEntity
	implements \Sellastica\Entity\Entity\IEntity
{
	use \Sellastica\Entity\Entity\TAbstractEntity;

	/** @var int @required */
	private $projectId;
	/** @var int @required */
	private $supplierId;
	/** @var int @required */
	private $feedId;
	/** @var int @required */
	private $productsCount;
	/** @var string|null @optional */
	private $url;
	/** @var bool @optional */
	private $supplierDownload = false;


	/**
	 * @param CatalogFeedProjectBuilder $builder
	 */
	public function __construct(CatalogFeedProjectBuilder $builder)
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
	 * @param int $projectId
	 */
	public function setProjectId(int $projectId): void
	{
		$this->projectId = $projectId;
	}

	/**
	 * @return \Sellastica\Project\Entity\Project
	 */
	public function getProject(): \Sellastica\Project\Entity\Project
	{
		return $this->relationService->getProject();
	}

	/**
	 * @return int
	 */
	public function getSupplierId(): int
	{
		return $this->supplierId;
	}

	/**
	 * @param int $supplierId
	 */
	public function setSupplierId(int $supplierId): void
	{
		$this->supplierId = $supplierId;
	}

	/**
	 * @return CatalogSupplier
	 */
	public function getSupplier(): CatalogSupplier
	{
		return $this->relationService->getSupplier();
	}

	/**
	 * @return int
	 */
	public function getFeedId(): int
	{
		return $this->feedId;
	}

	/**
	 * @param int $feedId
	 */
	public function setFeedId(int $feedId): void
	{
		$this->feedId = $feedId;
	}

	/**
	 * @return CatalogFeed
	 */
	public function getFeed(): CatalogFeed
	{
		return $this->relationService->getFeed();
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
	public function isSupplierDownload(): bool
	{
		return $this->supplierDownload;
	}

	/**
	 * @param bool $supplierDownload
	 */
	public function setSupplierDownload(bool $supplierDownload): void
	{
		$this->supplierDownload = $supplierDownload;
	}

	/**
	 * @return null|string
	 */
	public function getUrl(): ?string
	{
		return $this->url;
	}

	/**
	 * @param null|string $url
	 */
	public function setUrl(?string $url): void
	{
		$this->url = $url;
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
				'supplierId' => $this->supplierId,
				'feedId' => $this->feedId,
				'productsCount' => $this->productsCount,
				'supplierDownload' => $this->supplierDownload,
				'url' => $this->url,
			]
		);
	}
}