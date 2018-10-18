<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\Configuration;
use Sellastica\Entity\Mapping\IRepository;

/**
 * @method CatalogFeedProject find(int $id)
 * @method CatalogFeedProject findOneBy(array $filterValues)
 * @method CatalogFeedProject findOnePublishableBy(array $filterValues, Configuration $configuration = null)
 * @method CatalogFeedProject[]|CatalogFeedProjectCollection findAll(Configuration $configuration = null)
 * @method CatalogFeedProject[]|CatalogFeedProjectCollection findBy(array $filterValues, Configuration $configuration = null)
 * @method CatalogFeedProject[]|CatalogFeedProjectCollection findByIds(array $idsArray, Configuration $configuration = null)
 * @method CatalogFeedProject[]|CatalogFeedProjectCollection findPublishable(int $id)
 * @method CatalogFeedProject[]|CatalogFeedProjectCollection findAllPublishable(Configuration $configuration = null)
 * @method CatalogFeedProject[]|CatalogFeedProjectCollection findPublishableBy(array $filterValues, Configuration $configuration = null)
 * @see CatalogFeedProject
 */
interface ICatalogFeedProjectRepository extends IRepository
{
}