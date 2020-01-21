<?php
namespace Sellastica\CatalogSupplier\Mapping;

use Sellastica\Entity\Mapping\Repository;
use Sellastica\CatalogSupplier\Entity\Offer;
use Sellastica\CatalogSupplier\Entity\IOfferRepository;

/**
 * @property OfferDao $dao
 * @see Offer
 */
class OfferRepository extends Repository implements IOfferRepository
{
	use \Sellastica\DataGrid\Mapping\Dibi\TFilterRulesRepository;
}