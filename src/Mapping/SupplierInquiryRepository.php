<?php
namespace Sellastica\CatalogSupplier\Mapping;

use Sellastica\Entity\Mapping\Repository;
use Sellastica\CatalogSupplier\Entity\SupplierInquiry;
use Sellastica\CatalogSupplier\Entity\ISupplierInquiryRepository;

/**
 * @property SupplierInquiryDao $dao
 * @see SupplierInquiry
 */
class SupplierInquiryRepository extends Repository implements ISupplierInquiryRepository
{
	use \Sellastica\DataGrid\Mapping\Dibi\TFilterRulesRepository;
}