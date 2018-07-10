<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\Entity\EntityCollection;

/**
 * @property CatalogSupplier[] $items
 * @method CatalogSupplierCollection add($entity)
 * @method CatalogSupplierCollection remove($key)
 * @method CatalogSupplier|mixed getEntity(int $entityId, $default = null)
 * @method CatalogSupplier|mixed getBy(string $property, $value, $default = null)
 */
class CatalogSupplierCollection extends EntityCollection
{
}