<?php
namespace Sellastica\CatalogSupplier\Mapping;

use Sellastica\CatalogSupplier\Entity\IProjectFeedLogRepository;
use Sellastica\CatalogSupplier\Entity\ProjectFeedLog;
use Sellastica\Entity\Mapping\RepositoryProxy;

/**
 * @method \Sellastica\CatalogSupplier\Mapping\ProjectFeedLogRepository getRepository()
 * @see ProjectFeedLog
 */
class ProjectFeedLogRepositoryProxy extends RepositoryProxy implements IProjectFeedLogRepository
{
}