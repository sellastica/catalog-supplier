<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\Entity\EntityCollection;

/**
 * @property CatalogApplication[] $items
 * @method CatalogApplicationCollection add($entity)
 * @method CatalogApplicationCollection remove($key)
 * @method CatalogApplication|mixed getEntity(int $entityId, $default = null)
 * @method CatalogApplication|mixed getBy(string $property, $value, $default = null)
 */
class CatalogApplicationCollection extends EntityCollection
{
}