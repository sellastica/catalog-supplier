<?php
namespace Sellastica\CatalogSupplier\Model;

class FeedStatisticsMerger
{
	/** @var FeedStatistics */
	private $main;
	/** @var FeedStatistics[] */
	private $subordinates = [];


	/**
	 * @param FeedStatistics $main
	 */
	public function __construct(FeedStatistics $main)
	{
		$this->main = $main;
	}

	/**
	 * @param FeedStatistics $feedStatistics
	 */
	public function addSubordinate(FeedStatistics $feedStatistics): void
	{
		$this->subordinates[] = $feedStatistics;
	}

	/**
	 * @return FeedStatistics
	 */
	public function merge(): FeedStatistics
	{
		$mergedData = $this->main->getData();
		foreach ($this->subordinates as $statistic) {
			foreach ($statistic->getData() as $property => $data) {
				$mergedData[$property] = in_array($property, [FeedStatistics::QUANTITY, FeedStatistics::AVAILABILITY])
					? $this->main->getProductsCount()
					: min(max($data, $mergedData[$property] ?? 0), $this->main->getProductsCount());
			}
		}

		$statistics = new FeedStatistics([
			'productsCount' => $this->main->getProductsCount(),
			'data' => $mergedData,
		]);
		return $statistics;
	}
}