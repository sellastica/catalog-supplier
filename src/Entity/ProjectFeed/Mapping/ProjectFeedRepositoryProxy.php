<?php
namespace Sellastica\CatalogSupplier\Mapping;

use Sellastica\CatalogSupplier\Entity\IProjectFeedRepository;
use Sellastica\CatalogSupplier\Entity\ProjectFeed;
use Sellastica\Entity\Mapping\RepositoryProxy;

/**
 * @method \Sellastica\CatalogSupplier\Mapping\ProjectFeedRepository getRepository()
 * @see ProjectFeed
 */
class ProjectFeedRepositoryProxy extends RepositoryProxy implements IProjectFeedRepository
{
}