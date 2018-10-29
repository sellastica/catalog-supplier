<?php
namespace Sellastica\CatalogSupplier\Mapping;

use Sellastica\Entity\Mapping\RepositoryProxy;
use Sellastica\CatalogSupplier\Entity\IInstalledCatalogApplicationRepository;
use Sellastica\CatalogSupplier\Entity\InstalledCatalogApplication;

/**
 * @method InstalledCatalogApplicationRepository getRepository()
 * @see InstalledCatalogApplication
 */
class InstalledCatalogApplicationRepositoryProxy extends RepositoryProxy implements IInstalledCatalogApplicationRepository
{
}