<?php
namespace Sellastica\CatalogSupplier\Entity\Commission\Mapping;

use Sellastica\Entity\Mapping\RepositoryProxy;
use Sellastica\CatalogSupplier\Entity\Commission\Entity\ICommissionRepository;
use Sellastica\CatalogSupplier\Entity\Commission\Entity\Commission;

/**
 * @method CommissionRepository getRepository()
 * @see Commission
 */
class CommissionRepositoryProxy extends RepositoryProxy implements ICommissionRepository
{
	public function findCommissionSummaries(int $b2bProjectId): array
	{
		return $this->getRepository()->findCommissionSummaries($b2bProjectId);
	}

	public function getPriceToPay(
		int $b2bProjectId,
		\Sellastica\Localization\Model\Currency $currency
	): \Sellastica\Price\Price
	{
		return $this->getRepository()->getPriceToPay($b2bProjectId, $currency);
	}
}