<?php
namespace Sellastica\CatalogSupplier\Mapping;

use Sellastica\CatalogSupplier\Entity\ISupplierInquiryRepository;
use Sellastica\CatalogSupplier\Entity\SupplierInquiry;
use Sellastica\Entity\Mapping\RepositoryProxy;

/**
 * @method SupplierInquiryRepository getRepository()
 * @see SupplierInquiry
 */
class SupplierInquiryRepositoryProxy extends RepositoryProxy implements ISupplierInquiryRepository
{
	use \Sellastica\DataGrid\Mapping\Dibi\TFilterRulesRepositoryProxy;
}