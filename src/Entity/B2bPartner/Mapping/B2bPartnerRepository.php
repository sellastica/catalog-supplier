<?php
namespace Sellastica\CatalogSupplier\Entity\B2bPartner\Mapping;

use Sellastica\Entity\Mapping\Repository;
use Sellastica\CatalogSupplier\Entity\B2bPartner\Entity\B2bPartner;
use Sellastica\CatalogSupplier\Entity\B2bPartner\Entity\IB2bPartnerRepository;

/**
 * @property B2bPartnerDao $dao
 * @see B2bPartner
 */
class B2bPartnerRepository extends Repository implements IB2bPartnerRepository
{
	use \Sellastica\DataGrid\Mapping\Dibi\TFilterRulesRepository;
}