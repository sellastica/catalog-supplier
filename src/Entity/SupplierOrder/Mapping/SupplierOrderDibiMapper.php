<?php
namespace Sellastica\CatalogSupplier\Mapping;

/**
 * @see \Sellastica\CatalogSupplier\Entity\SupplierOrder
 */
class SupplierOrderDibiMapper extends \Sellastica\Entity\Mapping\DibiMapper
{
	use \Sellastica\DataGrid\Mapping\Dibi\TFilterRulesDibiMapper;

	/**
	 * @param bool $databaseName
	 * @return string
	 */
	protected function getTableName($databaseName = false): string
	{
		return ($databaseName ? $this->environment->getNapojseCrmDatabaseName() . '.' : '')
			. 'suppliers_order';
	}

	/**
	 * @param \Sellastica\Entity\Configuration|null $configuration
	 * @param \Sellastica\DataGrid\Model\FilterRuleCollection|null $rules
	 * @return \Dibi\Fluent
	 */
	protected function getAdminResource(
		\Sellastica\Entity\Configuration $configuration = null,
		\Sellastica\DataGrid\Model\FilterRuleCollection $rules = null
	): \Dibi\Fluent
	{
		$resource = parent::getAdminResource($configuration);
		if ($rules) {
			if ($rules['paid']) {
				$resource->innerJoin('invoice')
					->on('%n.invoiceId = invoice.id', $this->getTableName())
					->where('invoice.paidAmount >= invoice.priceToPay')
					->where('invoice.cancelled = 0');
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