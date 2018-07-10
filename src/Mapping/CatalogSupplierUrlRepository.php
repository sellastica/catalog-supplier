<?php
namespace Sellastica\CatalogSupplierUrl\Mapping;

use Sellastica\Entity\Mapping\Repository;
use Sellastica\CatalogSupplierUrl\Entity\CatalogSupplierUrl;
use Sellastica\CatalogSupplierUrl\Entity\ICatalogSupplierUrlRepository;

/**
 * @property CatalogSupplierUrlDao $dao
 * @see CatalogSupplierUrl
 */
class CatalogSupplierUrlRepository extends Repository implements ICatalogSupplierUrlRepository
{
}