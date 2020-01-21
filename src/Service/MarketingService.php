<?php
namespace Sellastica\CatalogSupplier\Service;

class MarketingService
{
	/**
	 * @var \Sellastica\CatalogSupplier\Service\CatalogSupplierService
	 */
	private $supplierService;
	/**
	 * @var \Sellastica\CatalogSupplier\Service\CatalogFeedService
	 */
	private $feedService;
	/**
	 * @var \Sellastica\Project\Service\ProjectService
	 */
	private $projectService;


	/**
	 * @param \Sellastica\CatalogSupplier\Service\CatalogSupplierService $supplierService
	 * @param \Sellastica\CatalogSupplier\Service\CatalogFeedService $feedService
	 * @param \Sellastica\Project\Service\ProjectService $projectService
	 */
	public function __construct(
		\Sellastica\CatalogSupplier\Service\CatalogSupplierService $supplierService,
		\Sellastica\CatalogSupplier\Service\CatalogFeedService $feedService,
		\Sellastica\Project\Service\ProjectService $projectService
	)
	{
		$this->supplierService = $supplierService;
		$this->feedService = $feedService;
		$this->projectService = $projectService;
	}

	/**
	 * @return int
	 */
	public function getSuppliersCount(): int
	{
		return $this->supplierService->findCount() * 2;
	}

	/**
	 * @return int
	 */
	public function getProjectsCount(): int
	{
		return floor($this->projectService->findBilledProjectsCount() * 2 / 10) * 10;
	}
}