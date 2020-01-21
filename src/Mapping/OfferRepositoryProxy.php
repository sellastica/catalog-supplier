<?php
namespace Sellastica\CatalogSupplier\Mapping;

use Sellastica\Entity\Mapping\RepositoryProxy;
use Sellastica\CatalogSupplier\Entity\IOfferRepository;
use Sellastica\CatalogSupplier\Entity\Offer;

/**
 * @method OfferRepository getRepository()
 * @see Offer
 */
class OfferRepositoryProxy extends RepositoryProxy implements IOfferRepository
{
	use \Sellastica\DataGrid\Mapping\Dibi\TFilterRulesRepositoryProxy;
}