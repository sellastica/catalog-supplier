<?php
namespace Sellastica\CatalogSupplier\Mapping;

use Sellastica\Entity\Mapping\RepositoryProxy;
use Sellastica\CatalogSupplier\Entity\ICatalogApplicationRepository;
use Sellastica\CatalogSupplier\Entity\CatalogApplication;

/**
 * @method CatalogApplicationRepository getRepository()
 * @see CatalogApplication
 */
class CatalogApplicationRepositoryProxy extends RepositoryProxy implements ICatalogApplicationRepository
{
}