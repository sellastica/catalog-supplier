<?php
namespace Sellastica\CatalogSupplier\Mapping;

use Sellastica\Entity\Mapping\Repository;
use Sellastica\CatalogSupplier\Entity\CatalogApplication;
use Sellastica\CatalogSupplier\Entity\ICatalogApplicationRepository;

/**
 * @property CatalogApplicationDao $dao
 * @see CatalogApplication
 */
class CatalogApplicationRepository extends Repository implements ICatalogApplicationRepository
{
}