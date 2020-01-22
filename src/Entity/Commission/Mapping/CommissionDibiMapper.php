<?php
namespace Sellastica\CatalogSupplier\Entity\Commission\Mapping;

/**
 * @see \Sellastica\CatalogSupplier\Entity\Commission\Entity\Commission
 */
class CommissionDibiMapper extends \Sellastica\Entity\Mapping\DibiMapper
{
	/**
	 * @return bool
	 */
	protected function isInCrmDatabase(): bool
	{
		return true;
	}

	/**
	 * @param int $b2bProjectId
	 * @return array
	 */
	public function findCommissionSummaries(int $b2bProjectId): array
	{
		$subselect = $this->database->select('SUM(commission)')
			->from($this->getTableName(true))->as('t2')
			->where('t2.b2bProjectId = %i', $b2bProjectId)
			->where('t2.commissionPaid IS NULL')
			->where('MONTH(t2.created) = commissionMonth')
			->where('YEAR(t2.created) = commissionYear');

		return $this->database->select('SUM(commission)')->as('price')
			->select('YEAR(created)')->as('commissionYear')
			->select('MONTH(created)')->as('commissionMonth')
			->select('currency')
			->select($subselect)->as('priceToPay')
			->from($this->getTableName(true))
			->where('b2bProjectId = %i', $b2bProjectId)
			->groupBy('commissionYear')
			->groupBy('commissionMonth')
			->groupBy('currency')
			->fetchAll();
	}

	/**
	 * @param int $b2bProjectId
	 * @param \Sellastica\Localization\Model\Currency $currency
	 * @return \Sellastica\Price\Price
	 */
	public function getPriceToPay(
		int $b2bProjectId,
		\Sellastica\Localization\Model\Currency $currency
	): \Sellastica\Price\Price
	{
		$result = $this->database
			->select('SUM(commission)')->as('withoutVat')
			->select('SUM(commission * vatRate / 100)')->as('vat')
			->from($this->getTableName(true))
			->where('b2bProjectId = %i', $b2bProjectId)
			->where('currency = %s', $currency->getCode())
			->where('commissionPaid IS NULL')
			->fetch();

		return $result
		&& !empty($result->withoutVat)
			? \Sellastica\Price\Price::sumPrice($result->withoutVat + $result->vat, $result->vat, $currency)
			: \Sellastica\Price\Price::zero($currency);
	}
}