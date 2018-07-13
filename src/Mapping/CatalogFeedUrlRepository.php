<?php
namespace Sellastica\CatalogSupplier\Mapping;

use Sellastica\Entity\Mapping\Repository;
use Sellastica\CatalogSupplier\Entity\CatalogFeedUrl;
use Sellastica\CatalogSupplier\Entity\ICatalogFeedUrlRepository;

/**
 * @property CatalogFeedUrlDao $dao
 * @see CatalogFeedUrl
 */
class CatalogFeedUrlRepository extends Repository implements ICatalogFeedUrlRepository
{
}