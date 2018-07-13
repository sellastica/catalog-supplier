<?php
namespace Sellastica\CatalogSupplier\Mapping;

use Sellastica\CatalogSupplier\Entity\CatalogFeed;
use Sellastica\CatalogSupplier\Entity\ICatalogFeedRepository;
use Sellastica\Entity\Mapping\Repository;

/**
 * @property CatalogFeedDao $dao
 * @see CatalogFeed
 */
class CatalogFeedRepository extends Repository implements ICatalogFeedRepository
{
	use \Sellastica\DataGrid\Mapping\Dibi\TFilterRulesRepository;


	/**
	 * @param array $hosts
	 * @return \Sellastica\CatalogSupplier\Entity\CatalogFeedCollection
	 */
	public function findByHosts(array $hosts): \Sellastica\CatalogSupplier\Entity\CatalogFeedCollection
	{
		return $this->initialize($this->dao->findByHosts($hosts));
	}
}