<?php
namespace Sellastica\CatalogSupplier\Entity\B2bPartner\Entity;

use Sellastica\Entity\Configuration;
use Sellastica\Entity\Mapping\IRepository;

/**
 * @method B2bPartner find(int $id)
 * @method B2bPartner findOneBy(array $filterValues)
 * @method B2bPartner findOnePublishableBy(array $filterValues, Configuration $configuration = null)
 * @method B2bPartner[]|B2bPartnerCollection findAll(Configuration $configuration = null)
 * @method B2bPartner[]|B2bPartnerCollection findBy(array $filterValues, Configuration $configuration = null)
 * @method B2bPartner[]|B2bPartnerCollection findByIds(array $idsArray, Configuration $configuration = null)
 * @method B2bPartner[]|B2bPartnerCollection findPublishable(int $id)
 * @method B2bPartner[]|B2bPartnerCollection findAllPublishable(Configuration $configuration = null)
 * @method B2bPartner[]|B2bPartnerCollection findPublishableBy(array $filterValues, Configuration $configuration = null)
 * @see B2bPartner
 */
interface IB2bPartnerRepository extends IRepository
{
}