<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\Configuration;
use Sellastica\Entity\Mapping\IRepository;

/**
 * @method ProjectFeed find(int $id)
 * @method ProjectFeed findOneBy(array $filterValues)
 * @method ProjectFeed findOnePublishableBy(array $filterValues, Configuration $configuration = null)
 * @method ProjectFeed[]|ProjectFeedCollection findAll(Configuration $configuration = null)
 * @method ProjectFeed[]|ProjectFeedCollection findBy(array $filterValues, Configuration $configuration = null)
 * @method ProjectFeed[]|ProjectFeedCollection findByIds(array $idsArray, Configuration $configuration = null)
 * @method ProjectFeed[]|ProjectFeedCollection findPublishable(int $id)
 * @method ProjectFeed[]|ProjectFeedCollection findAllPublishable(Configuration $configuration = null)
 * @method ProjectFeed[]|ProjectFeedCollection findPublishableBy(array $filterValues, Configuration $configuration = null)
 * @see ProjectFeed
 */
interface IProjectFeedRepository extends IRepository
{
}