<?php
namespace Sellastica\CatalogSupplier\Mapping;

use Sellastica\CatalogSupplier\Entity\CatalogFeedRule;
use Sellastica\CatalogSupplier\Entity\ICatalogFeedRuleRepository;
use Sellastica\Entity\Mapping\RepositoryProxy;

/**
 * @method CatalogFeedRuleRepository getRepository()
 * @see CatalogFeedRule
 */
class CatalogFeedRuleRepositoryProxy extends RepositoryProxy implements ICatalogFeedRuleRepository
{
}