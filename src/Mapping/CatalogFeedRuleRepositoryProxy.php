<?php
namespace Sellastica\CatalogSupplier\Mapping;

use Sellastica\Entity\Mapping\RepositoryProxy;
use Sellastica\CatalogSupplier\Entity\ICatalogFeedRuleRepository;
use Sellastica\CatalogSupplier\Entity\CatalogFeedRule;

/**
 * @method CatalogFeedRuleRepository getRepository()
 * @see CatalogFeedRule
 */
class CatalogFeedRuleRepositoryProxy extends RepositoryProxy implements ICatalogFeedRuleRepository
{
}