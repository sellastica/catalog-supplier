<?php
namespace Sellastica\CatalogSupplier\Mapping;

use Sellastica\Entity\Mapping\Repository;
use Sellastica\CatalogSupplier\Entity\InstalledCatalogApplication;
use Sellastica\CatalogSupplier\Entity\IInstalledCatalogApplicationRepository;

/**
 * @property InstalledCatalogApplicationDao $dao
 * @see InstalledCatalogApplication
 */
class InstalledCatalogApplicationRepository extends Repository implements IInstalledCatalogApplicationRepository
{
}