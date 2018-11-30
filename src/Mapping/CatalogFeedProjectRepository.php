<?php
namespace Sellastica\CatalogSupplier\Mapping;

use Sellastica\CatalogSupplier\Entity\CatalogFeedProject;
use Sellastica\CatalogSupplier\Entity\ICatalogFeedProjectRepository;
use Sellastica\Entity\Mapping\Repository;

/**
 * @property CatalogFeedProjectDao $dao
 * @see CatalogFeedProject
 */
class CatalogFeedProjectRepository extends Repository implements ICatalogFeedProjectRepository
{
}