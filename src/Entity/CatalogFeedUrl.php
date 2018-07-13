<?php
namespace Sellastica\CatalogSupplier\Entity;

/**
 * @generate-builder
 * @see CatalogFeedUrlBuilder
 */
class CatalogFeedUrl extends \Sellastica\Entity\Entity\AbstractEntity
	implements \Sellastica\Entity\Entity\IEntity
{
	use \Sellastica\Entity\Entity\TAbstractEntity;

	/** @var int @required */
	private $feedId;
	/** @var string @required */
	private $host;


	/**
	 * @param CatalogFeedUrlBuilder $builder
	 */
	public function __construct(CatalogFeedUrlBuilder $builder)
	{
		$this->hydrate($builder);
	}

	/**
	 * @return bool
	 */
	public static function isIdGeneratedByStorage(): bool
	{
		return true;
	}

	/**
	 * @return int
	 */
	public function getFeedId(): int
	{
		return $this->feedId;
	}

	/**
	 * @param int $feedId
	 */
	public function setFeedId(int $feedId): void
	{
		$this->feedId = $feedId;
	}

	/**
	 * @return string
	 */
	public function getHost(): string
	{
		return $this->host;
	}

	/**
	 * @param string $host
	 */
	public function setHost(string $host): void
	{
		$this->host = $host;
	}

	/**
	 * @return array
	 */
	public function toArray(): array
	{
		return [
			'feedId' => $this->feedId,
			'host' => $this->host,
		];
	}
}