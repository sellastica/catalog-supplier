<?php
namespace Sellastica\CatalogSupplier\Mapping;

use Sellastica\Entity\Mapping\Repository;
use Sellastica\CatalogSupplier\Entity\CatalogFeedRule;
use Sellastica\CatalogSupplier\Entity\ICatalogFeedRuleRepository;

/**
 * @property CatalogFeedRuleDao $dao
 * @see CatalogFeedRule
 */
class CatalogFeedRuleRepository extends Repository implements ICatalogFeedRuleRepository
{
}