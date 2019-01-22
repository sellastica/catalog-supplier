<?php
namespace Sellastica\CatalogSupplier\Entity;

/**
 * @generate-builder
 * @see InstalledCatalogApplicationBuilder
 */
class InstalledCatalogApplication extends \Sellastica\Entity\Entity\AbstractEntity
	implements \Sellastica\Entity\Entity\IEntity
{
	use \Sellastica\Entity\Entity\TAbstractEntity;

	const AUTH_NONE = 'none',
		AUTH_BASIC = 'basic',
		AUTH_NTLM = 'ntlm';

	/** @var int @required */
	private $applicationId;
	/** @var int @required */
	private $catalogFeedId;
	/** @var int @required */
	private $projectId;
	/** @var array @optional */
	private $options = [];


	/**
	 * @param InstalledCatalogApplicationBuilder $builder
	 */
	public function __construct(InstalledCatalogApplicationBuilder $builder)
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
	public function getApplicationId(): int
	{
		return $this->applicationId;
	}

	/**
	 * @param int $applicationId
	 */
	public function setApplicationId(int $applicationId): void
	{
		$this->applicationId = $applicationId;
	}

	/**
	 * @return int
	 */
	public function getCatalogFeedId(): int
	{
		return $this->catalogFeedId;
	}

	/**
	 * @param int $catalogFeedId
	 */
	public function setCatalogFeedId(int $catalogFeedId): void
	{
		$this->catalogFeedId = $catalogFeedId;
	}

	/**
	 * @return int
	 */
	public function getProjectId(): int
	{
		return $this->projectId;
	}

	/**
	 * @param int $projectId
	 */
	public function setProjectId(int $projectId): void
	{
		$this->projectId = $projectId;
	}

	/**
	 * @return array
	 */
	public function getOptions(): array
	{
		return $this->options;
	}

	/**
	 * @param array $options
	 */
	public function setOptions(array $options): void
	{
		$this->options = $options;
	}

	/**
	 * @param $name
	 * @param $default
	 * @return mixed|null
	 */
	public function getOption($name, $default = null)
	{
		return $this->options[$name] ?? $default;
	}

	/**
	 * @param $name
	 * @param $value
	 */
	public function setOption($name, $value): void
	{
		if (isset($value)) {
			$this->options[$name] = $value;
		} else {
			unset($this->options[$name]);
		}
	}

	/**
	 * @return array
	 */
	public function toArray(): array
	{
		return array_merge(
			$this->parentToArray(),
			[
				'applicationId' => $this->applicationId,
				'catalogFeedId' => $this->catalogFeedId,
				'projectId' => $this->projectId,
				'options' => \Nette\Utils\Json::encode($this->options),
			]
		);
	}
}