<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\Entity\EntityCollection;

/**
 * @property CatalogCategory[] $items
 * @method CatalogCategoryCollection add($entity)
 * @method CatalogCategoryCollection remove($key)
 * @method CatalogCategory|mixed getEntity(int $entityId, $default = null)
 * @method CatalogCategory|mixed getBy(string $property, $value, $default = null)
 */
class CatalogCategoryCollection extends EntityCollection
{
}