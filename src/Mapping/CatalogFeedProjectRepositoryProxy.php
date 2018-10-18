<?php
namespace Sellastica\CatalogSupplier\Mapping;

use Sellastica\Entity\Mapping\RepositoryProxy;
use Sellastica\CatalogSupplier\Entity\ICatalogFeedProjectRepository;
use Sellastica\CatalogSupplier\Entity\CatalogFeedProject;

/**
 * @method CatalogFeedProjectRepository getRepository()
 * @see CatalogFeedProject
 */
class CatalogFeedProjectRepositoryProxy extends RepositoryProxy implements ICatalogFeedProjectRepository
{
}