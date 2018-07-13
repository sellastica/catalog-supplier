<?php
namespace Sellastica\CatalogSupplier\Mapping;

use Sellastica\Entity\Mapping\RepositoryProxy;
use Sellastica\CatalogSupplier\Entity\ICatalogFeedUrlRepository;
use Sellastica\CatalogSupplier\Entity\CatalogFeedUrl;

/**
 * @method CatalogFeedUrlRepository getRepository()
 * @see CatalogFeedUrl
 */
class CatalogFeedUrlRepositoryProxy extends RepositoryProxy implements ICatalogFeedUrlRepository
{
}