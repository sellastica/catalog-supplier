<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\Configuration;
use Sellastica\Entity\Mapping\IRepository;

/**
 * @method ProjectFeedLog find(int $id)
 * @method ProjectFeedLog findOneBy(array $filterValues)
 * @method ProjectFeedLog findOnePublishableBy(array $filterValues, Configuration $configuration = null)
 * @method ProjectFeedLog[]|ProjectFeedLogCollection findAll(Configuration $configuration = null)
 * @method ProjectFeedLog[]|ProjectFeedLogCollection findBy(array $filterValues, Configuration $configuration = null)
 * @method ProjectFeedLog[]|ProjectFeedLogCollection findByIds(array $idsArray, Configuration $configuration = null)
 * @method ProjectFeedLog[]|ProjectFeedLogCollection findPublishable(int $id)
 * @method ProjectFeedLog[]|ProjectFeedLogCollection findAllPublishable(Configuration $configuration = null)
 * @method ProjectFeedLog[]|ProjectFeedLogCollection findPublishableBy(array $filterValues, Configuration $configuration = null)
 * @see ProjectFeedLog
 */
interface IProjectFeedLogRepository extends IRepository
{
}