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
	/** @var string @required */
	private $code;
	/** @var string|null @optional */
	private $homepage;
	/** @var string|null @optional */
	private $logo;


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
	 * @return string
	 */
	public function getCode(): string
	{
		return $this->code;
	}

	/**
	 * @param string $code
	 */
	public function setCode(string $code): void
	{
		$this->code = $code;
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
	 * @return string
	 */
	public function getRelativeRootDirectory(): string
	{
		return 'app/model/Suppliers/Suppliers/' . $this->getCode();
	}

	/**
	 * @return string
	 */
	public function getRelativePublicDirectory(): string
	{
		return 'www/applications/suppliers/suppliers/' . $this->getCode();
	}

	/**
	 * @return null|string
	 */
	public function getLogo(): ?string
	{
		return $this->logo;
	}

	/**
	 * @param null|string $logo
	 */
	public function setLogo(?string $logo): void
	{
		$this->logo = $logo;
	}

	/**
	 * @return null|string
	 */
	public function getLogoPath(): ?string
	{
		return $this->logo
			? $this->getRelativePublicDirectory() . '/' . $this->logo
			: null;
	}

	/**
	 * @return array
	 */
	public function toArray(): array
	{
		return array_merge(
			$this->parentToArray(),
			[
				'title' => $this->title,
				'code' => $this->code,
				'homepage' => $this->homepage,
				'logo' => $this->logo,
			]
		);
	}
}