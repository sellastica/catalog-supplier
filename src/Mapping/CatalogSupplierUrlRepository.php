<?php
namespace Sellastica\CatalogSupplier\Mapping;

use Sellastica\Entity\Mapping\Repository;
use Sellastica\CatalogSupplier\Entity\CatalogSupplierUrl;
use Sellastica\CatalogSupplier\Entity\ICatalogSupplierUrlRepository;

/**
 * @property CatalogSupplierUrlDao $dao
 * @see CatalogSupplierUrl
 */
class CatalogSupplierUrlRepository extends Repository implements ICatalogSupplierUrlRepository
{
}