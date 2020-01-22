<?php
namespace Sellastica\CatalogSupplier\Entity\Commission\Model;

class CommissionSummary
{
	/** @var int */
	private $year;
	/** @var int */
	private $month;
	/** @var \Sellastica\Price\Price */
	private $price;
	/** @var \Sellastica\Price\Price */
	private $priceToPay;


	/**
	 * @param int $year
	 * @param int $month
	 * @param \Sellastica\Price\Price $price
	 * @param \Sellastica\Price\Price $priceToPay
	 */
	public function __construct(
		int $year,
		int $month,
		\Sellastica\Price\Price $price,
		\Sellastica\Price\Price $priceToPay
	)
	{
		$this->year = $year;
		$this->month = $month;
		$this->price = $price;
		$this->priceToPay = $priceToPay;
	}

	/**
	 * @return int
	 */
	public function getYear(): int
	{
		return $this->year;
	}

	/**
	 * @return int
	 */
	public function getMonth(): int
	{
		return $this->month;
	}

	/**
	 * @return string
	 */
	public function getMonthAndYear(): string
	{
		return $this->month . '/' . $this->year;
	}

	/**
	 * @return \Sellastica\Price\Price
	 */
	public function getPrice(): \Sellastica\Price\Price
	{
		return $this->price;
	}

	/**
	 * @return \Sellastica\Price\Price
	 */
	public function getPriceToPay(): \Sellastica\Price\Price
	{
		return $this->priceToPay;
	}

	/**
	 * @param array $data
	 * @return CommissionSummary
	 */
	public static function fromArray(array $data): CommissionSummary
	{
		return new self(
			$data['commissionYear'],
			$data['commissionMonth'],
			new \Sellastica\Price\Price(
				$data['price'],
				false,
				21,
				\Sellastica\Localization\Model\Currency::from($data['currency'])
			),
			new \Sellastica\Price\Price(
				$data['priceToPay'],
				false,
				21,
				\Sellastica\Localization\Model\Currency::from($data['currency'])
			)
		);
	}
}