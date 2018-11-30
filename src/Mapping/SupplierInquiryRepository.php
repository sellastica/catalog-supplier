<?php
namespace Sellastica\CatalogSupplier\Mapping;

use Sellastica\CatalogSupplier\Entity\ISupplierInquiryRepository;
use Sellastica\CatalogSupplier\Entity\SupplierInquiry;
use Sellastica\Entity\Mapping\Repository;

/**
 * @property SupplierInquiryDao $dao
 * @see SupplierInquiry
 */
class SupplierInquiryRepository extends Repository implements ISupplierInquiryRepository
{
	use \Sellastica\DataGrid\Mapping\Dibi\TFilterRulesRepository;
}