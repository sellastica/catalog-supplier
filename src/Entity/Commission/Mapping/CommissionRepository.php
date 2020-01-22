<?php
namespace Sellastica\CatalogSupplier\Entity\Commission\Mapping;

use Sellastica\Entity\Mapping\Repository;
use Sellastica\CatalogSupplier\Entity\Commission\Entity\Commission;
use Sellastica\CatalogSupplier\Entity\Commission\Entity\ICommissionRepository;

/**
 * @property CommissionDao $dao
 * @see Commission
 */
class CommissionRepository extends Repository implements ICommissionRepository
{
	/**
	 * @param int $b2bProjectId
	 * @return array
	 */
	public function findCommissionSummaries(int $b2bProjectId): array
	{
		return $this->dao->findCommissionSummaries($b2bProjectId);
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
		return $this->dao->getPriceToPay($b2bProjectId, $currency);
	}
}