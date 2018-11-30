<?php
namespace Sellastica\CatalogSupplier\Mapping;

use Sellastica\CatalogSupplier\Entity\IInstalledCatalogApplicationRepository;
use Sellastica\CatalogSupplier\Entity\InstalledCatalogApplication;
use Sellastica\Entity\Mapping\RepositoryProxy;

/**
 * @method InstalledCatalogApplicationRepository getRepository()
 * @see InstalledCatalogApplication
 */
class InstalledCatalogApplicationRepositoryProxy extends RepositoryProxy implements IInstalledCatalogApplicationRepository
{
}