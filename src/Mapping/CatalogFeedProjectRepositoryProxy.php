<?php
namespace Sellastica\CatalogSupplier\Mapping;

use Sellastica\CatalogSupplier\Entity\CatalogFeedProject;
use Sellastica\CatalogSupplier\Entity\ICatalogFeedProjectRepository;
use Sellastica\Entity\Mapping\RepositoryProxy;

/**
 * @method CatalogFeedProjectRepository getRepository()
 * @see CatalogFeedProject
 */
class CatalogFeedProjectRepositoryProxy extends RepositoryProxy implements ICatalogFeedProjectRepository
{
}