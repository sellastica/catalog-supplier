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
	/** @var \Suppliers\Model\FeedType @required */
	private $type;
	/** @var string @required */
	private $title;
	/** @var string @required */
	private $itemXPath;
	/** @var string|null @optional */
	private $xsl;
	/** @var string|null @optional */
	private $xslVersion;
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
	 * @return \Suppliers\Model\FeedType
	 */
	public function getType(): \Suppliers\Model\FeedType
	{
		return $this->type;
	}

	/**
	 * @param \Suppliers\Model\FeedType $type
	 */
	public function setType(\Suppliers\Model\FeedType $type): void
	{
		$this->type = $type;
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
	 * @return string
	 */
	public function getItemXPath(): string
	{
		return $this->itemXPath;
	}

	/**
	 * @param string $itemXPath
	 */
	public function setItemXPath(string $itemXPath): void
	{
		$this->itemXPath = $itemXPath;
	}

	/**
	 * @return null|string
	 */
	public function getXsl(): ?string
	{
		return $this->xsl;
	}

	/**
	 * @param null|string $xsl
	 */
	public function setXsl(?string $xsl): void
	{
		$this->xsl = $xsl;
	}

	/**
	 * @return null|string
	 */
	public function getXslPath(): ?string
	{
		return $this->xsl
			? $this->getSupplier()->getRelativeRootDirectory() . '/' . $this->xsl
			: null;
	}

	/**
	 * @return null|string
	 */
	public function getXslVersion(): ?string
	{
		return $this->xslVersion;
	}

	/**
	 * @param null|string $xslVersion
	 */
	public function setXslVersion(?string $xslVersion): void
	{
		$this->xslVersion = $xslVersion;
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
	 * @return null|string
	 */
	public function getXsdPath(): ?string
	{
		return $this->xsd
			? $this->getSupplier()->getRelativeRootDirectory() . '/' . $this->xsd
			: null;
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
		return array_merge(
			$this->parentToArray(),
			[
				'supplierId' => $this->supplierId,
				'type' => $this->type->getValue(),
				'title' => $this->title,
				'itemXPath' => $this->itemXPath,
				'xsl' => $this->xsl,
				'xslVersion' => $this->xslVersion,
				'xsd' => $this->xsd,
			]
		);
	}
}