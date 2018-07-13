<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\IBuilder;
use Sellastica\Entity\TBuilder;

/**
 * @see CatalogFeedUrl
 */
class CatalogFeedUrlBuilder implements IBuilder
{
	use TBuilder;

	/** @var int */
	private $feedId;
	/** @var string */
	private $host;

	/**
	 * @param int $feedId
	 * @param string $host
	 */
	public function __construct(
		int $feedId,
		string $host
	)
	{
		$this->feedId = $feedId;
		$this->host = $host;
	}

	/**
	 * @return int
	 */
	public function getFeedId(): int
	{
		return $this->feedId;
	}

	/**
	 * @return string
	 */
	public function getHost(): string
	{
		return $this->host;
	}

	/**
	 * @return bool
	 */
	public function generateId(): bool
	{
		return !CatalogFeedUrl::isIdGeneratedByStorage();
	}

	/**
	 * @return CatalogFeedUrl
	 */
	public function build(): CatalogFeedUrl
	{
		return new CatalogFeedUrl($this);
	}

	/**
	 * @param int $feedId
	 * @param string $host
	 * @return self
	 */
	public static function create(
		int $feedId,
		string $host
	): self
	{
		return new self($feedId, $host);
	}
}