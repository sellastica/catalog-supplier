<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\Configuration;
use Sellastica\Entity\Mapping\IRepository;

/**
 * @method CatalogFeedOption find(int $id)
 * @method CatalogFeedOption findOneBy(array $filterValues)
 * @method CatalogFeedOption findOnePublishableBy(array $filterValues, Configuration $configuration = null)
 * @method CatalogFeedOption[]|CatalogFeedOptionCollection findAll(Configuration $configuration = null)
 * @method CatalogFeedOption[]|CatalogFeedOptionCollection findBy(array $filterValues, Configuration $configuration = null)
 * @method CatalogFeedOption[]|CatalogFeedOptionCollection findByIds(array $idsArray, Configuration $configuration = null)
 * @method CatalogFeedOption[]|CatalogFeedOptionCollection findPublishable(int $id)
 * @method CatalogFeedOption[]|CatalogFeedOptionCollection findAllPublishable(Configuration $configuration = null)
 * @method CatalogFeedOption[]|CatalogFeedOptionCollection findPublishableBy(array $filterValues, Configuration $configuration = null)
 * @see CatalogFeedOption
 */
interface ICatalogFeedOptionRepository extends IRepository
{
}