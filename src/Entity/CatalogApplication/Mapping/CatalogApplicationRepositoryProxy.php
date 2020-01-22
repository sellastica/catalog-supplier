<?php
namespace Sellastica\CatalogSupplier\Mapping;

use Sellastica\CatalogSupplier\Entity\CatalogApplication;
use Sellastica\CatalogSupplier\Entity\ICatalogApplicationRepository;
use Sellastica\Entity\Mapping\RepositoryProxy;

/**
 * @method CatalogApplicationRepository getRepository()
 * @see CatalogApplication
 */
class CatalogApplicationRepositoryProxy extends RepositoryProxy implements ICatalogApplicationRepository
{
}