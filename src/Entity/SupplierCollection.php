<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\Entity\EntityCollection;

/**
 * @property Supplier[] $items
 * @method SupplierCollection add($entity)
 * @method SupplierCollection remove($key)
 * @method Supplier|mixed getEntity(int $entityId, $default = null)
 * @method Supplier|mixed getBy(string $property, $value, $default = null)
 */
class SupplierCollection extends EntityCollection
{
}