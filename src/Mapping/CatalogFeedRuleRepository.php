<?php
namespace Sellastica\CatalogSupplier\Mapping;

use Sellastica\CatalogSupplier\Entity\CatalogFeedRule;
use Sellastica\CatalogSupplier\Entity\ICatalogFeedRuleRepository;
use Sellastica\Entity\Mapping\Repository;

/**
 * @property CatalogFeedRuleDao $dao
 * @see CatalogFeedRule
 */
class CatalogFeedRuleRepository extends Repository implements ICatalogFeedRuleRepository
{
}