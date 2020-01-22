<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\Configuration;
use Sellastica\Entity\Mapping\IRepository;

/**
 * @method CatalogFeedRule find(int $id)
 * @method CatalogFeedRule findOneBy(array $filterValues)
 * @method CatalogFeedRule findOnePublishableBy(array $filterValues, Configuration $configuration = null)
 * @method CatalogFeedRule[]|CatalogFeedRuleCollection findAll(Configuration $configuration = null)
 * @method CatalogFeedRule[]|CatalogFeedRuleCollection findBy(array $filterValues, Configuration $configuration = null)
 * @method CatalogFeedRule[]|CatalogFeedRuleCollection findByIds(array $idsArray, Configuration $configuration = null)
 * @method CatalogFeedRule[]|CatalogFeedRuleCollection findPublishable(int $id)
 * @method CatalogFeedRule[]|CatalogFeedRuleCollection findAllPublishable(Configuration $configuration = null)
 * @method CatalogFeedRule[]|CatalogFeedRuleCollection findPublishableBy(array $filterValues, Configuration $configuration = null)
 * @see CatalogFeedRule
 */
interface ICatalogFeedRuleRepository extends IRepository
{
}