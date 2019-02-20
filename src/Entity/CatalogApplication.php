<?php
namespace Sellastica\CatalogSupplier\Entity;

/**
 * @generate-builder
 * @see CatalogApplicationBuilder
 */
class CatalogApplication extends \Sellastica\Entity\Entity\AbstractEntity
	implements \Sellastica\Entity\Entity\IEntity
{
	use \Sellastica\Entity\Entity\TAbstractEntity;

	/** @var string @required */
	private $title;
	/** @var string @required */
	private $code;
	/** @var string|null @optional */
	private $perex;
	/** @var string|null @optional */
	private $description;
	/** @var bool @optional */
	private $shoptet = false;
	/** @var bool @optional */
	private $visible = true;
	/** @var bool @optional */
	private $global = false;


	/**
	 * @param CatalogApplicationBuilder $builder
	 */
	public function __construct(CatalogApplicationBuilder $builder)
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
	 * @return string
	 */
	public function getTitle(): string
	{
		return $this->title;
	}

	/**
	 * @param string $title
	 */
	public function setTitle(string $title): void
	{
		$this->title = $title;
	}

	/**
	 * @return string
	 */
	public function getCode(): string
	{
		return $this->code;
	}

	/**
	 * @param string $code
	 */
	public function setCode(string $code): void
	{
		$this->code = $code;
	}

	/**
	 * @return null|string
	 */
	public function getPerex(): ?string
	{
		return $this->perex;
	}

	/**
	 * @param null|string $perex
	 */
	public function setPerex(?string $perex): void
	{
		$this->perex = $perex;
	}

	/**
	 * @return null|string
	 */
	public function getDescription(): ?string
	{
		return $this->description;
	}

	/**
	 * @param null|string $description
	 */
	public function setDescription(?string $description): void
	{
		$this->description = $description;
	}

	/**
	 * @return bool
	 */
	public function isShoptet(): bool
	{
		return $this->shoptet;
	}

	/**
	 * @param bool $shoptet
	 */
	public function setShoptet(bool $shoptet): void
	{
		$this->shoptet = $shoptet;
	}

	/**
	 * @return bool
	 */
	public function isVisible(): bool
	{
		return $this->visible;
	}

	/**
	 * @param bool $visible
	 */
	public function setVisible(bool $visible): void
	{
		$this->visible = $visible;
	}

	/**
	 * @return bool
	 */
	public function isGlobal(): bool
	{
		return $this->global;
	}

	/**
	 * @param bool $global
	 */
	public function setGlobal(bool $global): void
	{
		$this->global = $global;
	}

	/**
	 * @return array
	 */
	public function toArray(): array
	{
		return array_merge(
			$this->parentToArray(),
			[
				'title' => $this->title,
				'code' => $this->code,
				'perex' => $this->perex,
				'description' => $this->description,
				'shoptet' => $this->shoptet,
				'visible' => $this->visible,
				'global' => $this->global,
			]
		);
	}
}