<?php
namespace Sellastica\CatalogSupplier\Entity;

/**
 * @generate-builder
 * @see CatalogFeedBuilder
 * 
 * @property CatalogFeedRelations $relationService
 */
class CatalogFeed extends \Sellastica\Entity\Entity\AbstractEntity
	implements \Sellastica\Entity\Entity\IEntity
{
	use \Sellastica\Entity\Entity\TAbstractEntity;

	/** @var int @required */
	private $supplierId;
	/** @var string @required */
	private $title;
	/** @var string|null @optional */
	private $xsd;


	/**
	 * @param CatalogFeedBuilder $builder
	 */
	public function __construct(CatalogFeedBuilder $builder)
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
	 * @return string
	 */
	public function getTitle(): string
	{
		return $this->title;
	}

	/**
	 * @param string $title
	 */
	public function setTitle(string $title): void
	{
		$this->title = $title;
	}

	/**
	 * @return null|string
	 */
	public function getXsd(): ?string
	{
		return $this->xsd;
	}

	/**
	 * @param null|string $xsd
	 */
	public function setXsd(?string $xsd): void
	{
		$this->xsd = $xsd;
	}

	/**
	 * @return CatalogFeedUrlCollection
	 */
	public function getUrls(): CatalogFeedUrlCollection
	{
		return $this->relationService->getUrls();
	}

	/**
	 * @return array
	 */
	public function toArray(): array
	{
		return [
			'supplierId' => $this->supplierId,
			'title' => $this->title,
			'xsd' => $this->xsd,
		];
	}
}