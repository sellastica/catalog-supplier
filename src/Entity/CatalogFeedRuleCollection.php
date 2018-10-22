<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\Entity\EntityCollection;

/**
 * @property CatalogFeedRule[] $items
 * @method CatalogFeedRuleCollection add($entity)
 * @method CatalogFeedRuleCollection remove($key)
 * @method CatalogFeedRule|mixed getEntity(int $entityId, $default = null)
 * @method CatalogFeedRule|mixed getBy(string $property, $value, $default = null)
 */
class CatalogFeedRuleCollection extends EntityCollection
{
}