<?php
namespace Sellastica\CatalogSupplier\Entity;

/**
 * @generate-builder
 * @see CatalogCategoryBuilder
 */
class CatalogCategory extends \Sellastica\Entity\Entity\AbstractEntity
	implements \Sellastica\Entity\Entity\IEntity, \Sellastica\Twig\Model\IProxable
{
	use \Sellastica\Entity\Entity\TAbstractEntity;

	/** @var string @required */
	private $title;


	/**
	 * @param CatalogCategoryBuilder $builder
	 */
	public function __construct(CatalogCategoryBuilder $builder)
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
	 * @return array
	 */
	public function toArray(): array
	{
		return array_merge(
			$this->parentToArray(),
			[
				'title' => $this->title,
			]
		);
	}

	/**
	 * @return \Sellastica\CatalogCategory\Presentation\CatalogCategoryProxy
	 */
	public function toProxy(): \Sellastica\CatalogCategory\Presentation\CatalogCategoryProxy
	{
		return new \Sellastica\CatalogCategory\Presentation\CatalogCategoryProxy($this);
	}
}