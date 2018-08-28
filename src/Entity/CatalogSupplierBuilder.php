<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\IBuilder;
use Sellastica\Entity\TBuilder;

/**
 * @see CatalogSupplier
 */
class CatalogSupplierBuilder implements IBuilder
{
	use TBuilder;

	/** @var string */
	private $title;
	/** @var string */
	private $code;
	/** @var \Nette\Http\Url */
	private $homepage;
	/** @var string|null */
	private $logo;
	/** @var string|null */
	private $company;
	/** @var \Sellastica\Identity\Model\Email|null */
	private $email;
	/** @var string|null */
	private $phone;

	/**
	 * @param string $title
	 * @param string $code
	 */
	public function __construct(
		string $title,
		string $code
	)
	{
		$this->title = $title;
		$this->code = $code;
	}

	/**
	 * @return string
	 */
	public function getTitle(): string
	{
		return $this->title;
	}

	/**
	 * @return string
	 */
	public function getCode(): string
	{
		return $this->code;
	}

	/**
	 * @return \Nette\Http\Url
	 */
	public function getHomepage(): \Nette\Http\Url
	{
		return $this->homepage;
	}

	/**
	 * @param \Nette\Http\Url $homepage
	 * @return $this
	 */
	public function homepage(\Nette\Http\Url $homepage)
	{
		$this->homepage = $homepage;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getLogo()
	{
		return $this->logo;
	}

	/**
	 * @param string|null $logo
	 * @return $this
	 */
	public function logo(string $logo = null)
	{
		$this->logo = $logo;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getCompany()
	{
		return $this->company;
	}

	/**
	 * @param string|null $company
	 * @return $this
	 */
	public function company(string $company = null)
	{
		$this->company = $company;
		return $this;
	}

	/**
	 * @return \Sellastica\Identity\Model\Email|null
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * @param \Sellastica\Identity\Model\Email|null $email
	 * @return $this
	 */
	public function email(\Sellastica\Identity\Model\Email $email = null)
	{
		$this->email = $email;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getPhone()
	{
		return $this->phone;
	}

	/**
	 * @param string|null $phone
	 * @return $this
	 */
	public function phone(string $phone = null)
	{
		$this->phone = $phone;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function generateId(): bool
	{
		return !CatalogSupplier::isIdGeneratedByStorage();
	}

	/**
	 * @return CatalogSupplier
	 */
	public function build(): CatalogSupplier
	{
		return new CatalogSupplier($this);
	}

	/**
	 * @param string $title
	 * @param string $code
	 * @return self
	 */
	public static function create(
		string $title,
		string $code
	): self
	{
		return new self($title, $code);
	}
}