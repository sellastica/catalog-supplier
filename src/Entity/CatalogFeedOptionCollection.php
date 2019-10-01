<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\Entity\EntityCollection;

/**
 * @property CatalogFeedOption[] $items
 * @method CatalogFeedOptionCollection add($entity)
 * @method CatalogFeedOptionCollection remove($key)
 * @method CatalogFeedOption|mixed getEntity(int $entityId, $default = null)
 * @method CatalogFeedOption|mixed getBy(string $property, $value, $default = null)
 */
class CatalogFeedOptionCollection extends EntityCollection
{
}