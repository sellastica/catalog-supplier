<?php
namespace Sellastica\CatalogSupplier\Entity\Commission\Mapping;

/**
 * @see \Sellastica\CatalogSupplier\Entity\Commission\Entity\Commission
 * @property CommissionDibiMapper $mapper
 */
class CommissionDao extends \Sellastica\Entity\Mapping\Dao
{
	/**
	 * @param int $b2bProjectId
	 * @return array
	 */
	public function findCommissionSummaries(int $b2bProjectId): array
	{
		return $this->mapper->findCommissionSummaries($b2bProjectId);
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
		return $this->mapper->getPriceToPay($b2bProjectId, $currency);
	}

	/**
	 * @inheritDoc
	 */
	protected function getBuilder(
		$data,
		$first = null,
		$second = null
	): \Sellastica\Entity\IBuilder
	{
		$data->commission = new \Sellastica\Price\Price(
			$data->commission,
			false,
			$data->vatRate,
			\Sellastica\Localization\Model\Currency::from($data->currency)
		);
		return \Sellastica\CatalogSupplier\Entity\Commission\Entity\CommissionBuilder::create(
			$data->invoiceId,
			$data->projectId,
			$data->b2bProjectId,
			$data->commissionRatio,
			$data->commission
		)->hydrate($data);
	}

	/**
	 * @return \Sellastica\CatalogSupplier\Entity\Commission\Entity\CommissionCollection
	 */
	public function getEmptyCollection(): \Sellastica\Entity\Entity\EntityCollection
	{
		return new \Sellastica\CatalogSupplier\Entity\Commission\Entity\CommissionCollection;
	}
}