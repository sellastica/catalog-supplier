<?php
namespace Sellastica\CatalogSupplier\Entity\B2bPartner\Mapping;

use Sellastica\Entity\Mapping\RepositoryProxy;
use Sellastica\CatalogSupplier\Entity\B2bPartner\Entity\IB2bPartnerRepository;
use Sellastica\CatalogSupplier\Entity\B2bPartner\Entity\B2bPartner;

/**
 * @method B2bPartnerRepository getRepository()
 * @see B2bPartner
 */
class B2bPartnerRepositoryProxy extends RepositoryProxy implements IB2bPartnerRepository
{
}