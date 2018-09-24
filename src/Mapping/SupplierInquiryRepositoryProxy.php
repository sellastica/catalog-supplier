<?php
namespace Sellastica\CatalogSupplier\Mapping;

use Sellastica\Entity\Mapping\RepositoryProxy;
use Sellastica\CatalogSupplier\Entity\ISupplierInquiryRepository;
use Sellastica\CatalogSupplier\Entity\SupplierInquiry;

/**
 * @method SupplierInquiryRepository getRepository()
 * @see SupplierInquiry
 */
class SupplierInquiryRepositoryProxy extends RepositoryProxy implements ISupplierInquiryRepository
{
	use \Sellastica\DataGrid\Mapping\Dibi\TFilterRulesRepositoryProxy;
}