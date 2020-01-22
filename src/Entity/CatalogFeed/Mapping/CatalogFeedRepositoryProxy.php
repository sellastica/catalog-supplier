<?php
namespace Sellastica\CatalogSupplier\Mapping;

use Sellastica\CatalogSupplier\Entity\CatalogFeed;
use Sellastica\CatalogSupplier\Entity\ICatalogFeedRepository;
use Sellastica\Entity\Mapping\RepositoryProxy;

/**
 * @method CatalogFeedRepository getRepository()
 * @see CatalogFeed
 */
class CatalogFeedRepositoryProxy extends RepositoryProxy implements ICatalogFeedRepository
{
	use \Sellastica\DataGrid\Mapping\Dibi\TFilterRulesRepositoryProxy;


	public function findByCategoryId(
		int $categoryId,
		\Sellastica\Entity\Configuration $configuration = null
	): \Sellastica\CatalogSupplier\Entity\CatalogFeedCollection
	{
		return $this->getRepository()->findByCategoryId($categoryId, $configuration);
	}

	public function findVisibleByCategoryId(
		int $categoryId,
		\Sellastica\Entity\Configuration $configuration = null
	): \Sellastica\CatalogSupplier\Entity\CatalogFeedCollection
	{
		return $this->getRepository()->findVisibleByCategoryId($categoryId, $configuration);
	}

	public function findByHosts(array $hosts): \Sellastica\CatalogSupplier\Entity\CatalogFeedCollection
	{
		return $this->getRepository()->findByHosts($hosts);
	}
}