<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\Entity\EntityCollection;

/**
 * @property CatalogFeed[] $items
 * @method CatalogFeedCollection add($entity)
 * @method CatalogFeedCollection remove($key)
 * @method CatalogFeed|mixed getEntity(int $entityId, $default = null)
 * @method CatalogFeed|mixed getBy(string $property, $value, $default = null)
 */
class CatalogFeedCollection extends EntityCollection
{
}