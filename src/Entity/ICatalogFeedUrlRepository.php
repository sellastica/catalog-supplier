<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\Configuration;
use Sellastica\Entity\Mapping\IRepository;

/**
 * @method CatalogFeedUrl find(int $id)
 * @method CatalogFeedUrl findOneBy(array $filterValues)
 * @method CatalogFeedUrl findOnePublishableBy(array $filterValues, Configuration $configuration = null)
 * @method CatalogFeedUrl[]|CatalogFeedUrlCollection findAll(Configuration $configuration = null)
 * @method CatalogFeedUrl[]|CatalogFeedUrlCollection findBy(array $filterValues, Configuration $configuration = null)
 * @method CatalogFeedUrl[]|CatalogFeedUrlCollection findByIds(array $idsArray, Configuration $configuration = null)
 * @method CatalogFeedUrl[]|CatalogFeedUrlCollection findPublishable(int $id)
 * @method CatalogFeedUrl[]|CatalogFeedUrlCollection findAllPublishable(Configuration $configuration = null)
 * @method CatalogFeedUrl[]|CatalogFeedUrlCollection findPublishableBy(array $filterValues, Configuration $configuration = null)
 * @see CatalogFeedUrl
 */
interface ICatalogFeedUrlRepository extends IRepository
{
}