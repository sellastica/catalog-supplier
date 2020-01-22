<?php
namespace Sellastica\CatalogSupplier\Mapping;

use Sellastica\CatalogSupplier\Entity\CatalogApplication;
use Sellastica\CatalogSupplier\Entity\ICatalogApplicationRepository;
use Sellastica\Entity\Mapping\Repository;

/**
 * @property CatalogApplicationDao $dao
 * @see CatalogApplication
 */
class CatalogApplicationRepository extends Repository implements ICatalogApplicationRepository
{
}