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


	public function findByHosts(array $hosts): \Sellastica\CatalogSupplier\Entity\CatalogFeedCollection
	{
		return $this->getRepository()->findByHosts($hosts);
	}
}