<?php
namespace Sellastica\CatalogSupplier\Mapping;

use Sellastica\CatalogSupplier\Entity\IInstalledCatalogApplicationRepository;
use Sellastica\CatalogSupplier\Entity\InstalledCatalogApplication;
use Sellastica\Entity\Mapping\Repository;

/**
 * @property InstalledCatalogApplicationDao $dao
 * @see InstalledCatalogApplication
 */
class InstalledCatalogApplicationRepository extends Repository implements IInstalledCatalogApplicationRepository
{
}