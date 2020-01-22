<?php
namespace Sellastica\CatalogSupplier\Mapping;

use Sellastica\Entity\Mapping\Repository;
use Sellastica\CatalogSupplier\Entity\CatalogFeedOption;
use Sellastica\CatalogSupplier\Entity\ICatalogFeedOptionRepository;

/**
 * @property CatalogFeedOptionDao $dao
 * @see CatalogFeedOption
 */
class CatalogFeedOptionRepository extends Repository implements ICatalogFeedOptionRepository
{
}