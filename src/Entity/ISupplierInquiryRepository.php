<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\Configuration;
use Sellastica\Entity\Mapping\IRepository;

/**
 * @method SupplierInquiry find(int $id)
 * @method SupplierInquiry findOneBy(array $filterValues)
 * @method SupplierInquiry findOnePublishableBy(array $filterValues, Configuration $configuration = null)
 * @method SupplierInquiry[]|SupplierInquiryCollection findAll(Configuration $configuration = null)
 * @method SupplierInquiry[]|SupplierInquiryCollection findBy(array $filterValues, Configuration $configuration = null)
 * @method SupplierInquiry[]|SupplierInquiryCollection findByIds(array $idsArray, Configuration $configuration = null)
 * @method SupplierInquiry[]|SupplierInquiryCollection findPublishable(int $id)
 * @method SupplierInquiry[]|SupplierInquiryCollection findAllPublishable(Configuration $configuration = null)
 * @method SupplierInquiry[]|SupplierInquiryCollection findPublishableBy(array $filterValues, Configuration $configuration = null)
 * @see SupplierInquiry
 */
interface ISupplierInquiryRepository extends IRepository
{
}