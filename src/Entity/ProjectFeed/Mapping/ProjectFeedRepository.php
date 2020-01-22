<?php
namespace Sellastica\CatalogSupplier\Mapping;

use Sellastica\CatalogSupplier\Entity\IProjectFeedRepository;
use Sellastica\CatalogSupplier\Entity\ProjectFeed;
use Sellastica\Entity\Mapping\Repository;

/**
 * @property \Sellastica\CatalogSupplier\Mapping\ProjectFeedDao $dao
 * @see \Sellastica\CatalogSupplier\Entity\ProjectFeed
 */
class ProjectFeedRepository extends Repository implements IProjectFeedRepository
{
}