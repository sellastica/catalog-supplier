<?php
namespace Sellastica\CatalogSupplier\Mapping;

use Sellastica\Entity\Mapping\RepositoryProxy;
use Sellastica\CatalogSupplier\Entity\ICatalogFeedOptionRepository;
use Sellastica\CatalogSupplier\Entity\CatalogFeedOption;

/**
 * @method CatalogFeedOptionRepository getRepository()
 * @see CatalogFeedOption
 */
class CatalogFeedOptionRepositoryProxy extends RepositoryProxy implements ICatalogFeedOptionRepository
{
}