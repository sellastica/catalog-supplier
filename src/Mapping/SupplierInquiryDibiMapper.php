<?php
namespace Sellastica\CatalogSupplier\Mapping;

/**
 * @see \Sellastica\CatalogSupplier\Entity\SupplierInquiry
 */
class SupplierInquiryDibiMapper extends \Sellastica\Entity\Mapping\DibiMapper
{
	use \Sellastica\DataGrid\Mapping\Dibi\TFilterRulesDibiMapper;


	/**
	 * @return bool
	 */
	protected function isInCrmDatabase(): bool
	{
		return true;
	}

	/**
	 * @param bool $databaseName
	 * @return string
	 */
	protected function getTableName($databaseName = false): string
	{
		return ($databaseName ? $this->environment->getNapojSeCrmDatabaseName() . '.' : '')
			. 'suppliers_inquiry';
	}

	/**
	 * @param \Sellastica\Entity\Configuration $configuration
	 * @param \Sellastica\DataGrid\Model\FilterRuleCollection $rules
	 * @return \Dibi\Fluent
	 */
	protected function getAdminResource(
		\Sellastica\Entity\Configuration $configuration = null,
		\Sellastica\DataGrid\Model\FilterRuleCollection $rules = null
	): \Dibi\Fluent
	{
		$resource = $this->getResource($configuration);

		if (isset($rules)) {
			//deadline
			if ($rules['deadline']) {
				$resource->where('deadline <= NOW()')
					->where('status IN (%sN)', [
						\Sellastica\CatalogSupplier\Model\OrderStatus::CONFIRMED,
						\Sellastica\CatalogSupplier\Model\OrderStatus::NEW,
					]);
			}

			//invoice
			if ($rules['invoice']) {
				if ($rules['invoice']->getValue()) {
					$resource->where('invoiceId IS NOT NULL');
				} else {
					$resource->where('invoiceId IS NULL');
				}
			}
		}

		return $resource;
	}
}