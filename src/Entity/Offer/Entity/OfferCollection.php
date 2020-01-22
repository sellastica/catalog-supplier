<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\Entity\EntityCollection;

/**
 * @property Offer[] $items
 * @method OfferCollection add($entity)
 * @method OfferCollection remove($key)
 * @method Offer|mixed getEntity(int $entityId, $default = null)
 * @method Offer|mixed getBy(string $property, $value, $default = null)
 */
class OfferCollection extends EntityCollection
{
}