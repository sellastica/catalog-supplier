<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\Configuration;
use Sellastica\Entity\Mapping\IRepository;

/**
 * @method InstalledCatalogApplication find(int $id)
 * @method InstalledCatalogApplication findOneBy(array $filterValues)
 * @method InstalledCatalogApplication findOnePublishableBy(array $filterValues, Configuration $configuration = null)
 * @method InstalledCatalogApplication[]|InstalledCatalogApplicationCollection findAll(Configuration $configuration = null)
 * @method InstalledCatalogApplication[]|InstalledCatalogApplicationCollection findBy(array $filterValues, Configuration $configuration = null)
 * @method InstalledCatalogApplication[]|InstalledCatalogApplicationCollection findByIds(array $idsArray, Configuration $configuration = null)
 * @method InstalledCatalogApplication[]|InstalledCatalogApplicationCollection findPublishable(int $id)
 * @method InstalledCatalogApplication[]|InstalledCatalogApplicationCollection findAllPublishable(Configuration $configuration = null)
 * @method InstalledCatalogApplication[]|InstalledCatalogApplicationCollection findPublishableBy(array $filterValues, Configuration $configuration = null)
 * @see InstalledCatalogApplication
 */
interface IInstalledCatalogApplicationRepository extends IRepository
{
}