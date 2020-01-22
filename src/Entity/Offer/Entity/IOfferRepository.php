<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\Configuration;
use Sellastica\Entity\Mapping\IRepository;

/**
 * @method Offer find(int $id)
 * @method Offer findOneBy(array $filterValues)
 * @method Offer findOnePublishableBy(array $filterValues, Configuration $configuration = null)
 * @method Offer[]|OfferCollection findAll(Configuration $configuration = null)
 * @method Offer[]|OfferCollection findBy(array $filterValues, Configuration $configuration = null)
 * @method Offer[]|OfferCollection findByIds(array $idsArray, Configuration $configuration = null)
 * @method Offer[]|OfferCollection findPublishable(int $id)
 * @method Offer[]|OfferCollection findAllPublishable(Configuration $configuration = null)
 * @method Offer[]|OfferCollection findPublishableBy(array $filterValues, Configuration $configuration = null)
 * @see Offer
 */
interface IOfferRepository extends IRepository
{
}