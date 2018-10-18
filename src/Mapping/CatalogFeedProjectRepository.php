<?php
namespace Sellastica\CatalogSupplier\Mapping;

use Sellastica\Entity\Mapping\Repository;
use Sellastica\CatalogSupplier\Entity\CatalogFeedProject;
use Sellastica\CatalogSupplier\Entity\ICatalogFeedProjectRepository;

/**
 * @property CatalogFeedProjectDao $dao
 * @see CatalogFeedProject
 */
class CatalogFeedProjectRepository extends Repository implements ICatalogFeedProjectRepository
{
}