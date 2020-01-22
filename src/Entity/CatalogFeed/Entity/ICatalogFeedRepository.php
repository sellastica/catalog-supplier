<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\Configuration;
use Sellastica\Entity\Mapping\IRepository;

/**
 * @method CatalogFeed find(int $id)
 * @method CatalogFeed findOneBy(array $filterValues)
 * @method CatalogFeed findOnePublishableBy(array $filterValues, Configuration $configuration = null)
 * @method CatalogFeed[]|CatalogFeedCollection findAll(Configuration $configuration = null)
 * @method CatalogFeed[]|CatalogFeedCollection findBy(array $filterValues, Configuration $configuration = null)
 * @method CatalogFeed[]|CatalogFeedCollection findByIds(array $idsArray, Configuration $configuration = null)
 * @method CatalogFeed[]|CatalogFeedCollection findPublishable(int $id)
 * @method CatalogFeed[]|CatalogFeedCollection findAllPublishable(Configuration $configuration = null)
 * @method CatalogFeed[]|CatalogFeedCollection findPublishableBy(array $filterValues, Configuration $configuration = null)
 * @see CatalogFeed
 */
interface ICatalogFeedRepository extends IRepository
{
}