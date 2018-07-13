<?php
namespace Sellastica\CatalogSupplier\Entity;

/**
 * @generate-builder
 * @see CatalogSupplierBuilder
 *
 * @property CatalogSupplierRelations $relationService
 */
class CatalogSupplier extends \Sellastica\Entity\Entity\AbstractEntity
	implements \Sellastica\Entity\Entity\IEntity
{
	use \Sellastica\Entity\Entity\TAbstractEntity;

	/** @var string @required */
	private $title;
	/** @var string|null @optional */
	private $homepage;


	/**
	 * @param CatalogSupplierBuilder $builder
	 */
	public function __construct(CatalogSupplierBuilder $builder)
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
	public function getHomepage(): ?string
	{
		return $this->homepage;
	}

	/**
	 * @param null|string $homepage
	 */
	public function setHomepage(?string $homepage): void
	{
		$this->homepage = $homepage;
	}

	/**
	 * @return CatalogFeedCollection|CatalogFeed[]
	 */
	public function getCatalogFeeds(): CatalogFeedCollection
	{
		return $this->relationService->getCatalogFeeds();
	}

	/**
	 * @return array
	 */
	public function toArray(): array
	{
		return [
			'title' => $this->title,
			'homepage' => $this->homepage,
		];
	}
}