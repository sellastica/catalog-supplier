<?php
namespace Sellastica\CatalogSupplier\Presentation;

/**
 * {@inheritdoc}
 * @property \Sellastica\CatalogSupplier\Entity\CatalogCategory $parent
 */
class CatalogCategoryProxy extends \Sellastica\Twig\Model\ProxyEntity
{
	/**
	 * @return int
	 */
	public function getId(): int
	{
		return $this->parent->getId();
	}

	/**
	 * @return string
	 */
	public function getTitle(): string
	{
		return $this->parent->getTitle();
	}

	/**
	 * @return string
	 */
	public function getShortName(): string
	{
		return 'catalog_category';
	}

	/**
	 * @return array
	 */
	public function getAllowedProperties(): array
	{
		return [
			'id',
			'title',
		];
	}
}