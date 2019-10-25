<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\Entity\EntityCollection;

/**
 * @property SupplierOrder[] $items
 * @method SupplierOrderCollection add($entity)
 * @method SupplierOrderCollection remove($key)
 * @method SupplierOrder|mixed getEntity(int $entityId, $default = null)
 * @method SupplierOrder|mixed getBy(string $property, $value, $default = null)
 */
class SupplierOrderCollection extends EntityCollection
{
}