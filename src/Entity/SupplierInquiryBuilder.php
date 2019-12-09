<?php
namespace Sellastica\CatalogSupplier\Entity;

use Sellastica\Entity\IBuilder;
use Sellastica\Entity\TBuilder;

/**
 * @see SupplierInquiry
 */
class SupplierInquiryBuilder implements IBuilder
{
	use TBuilder;

	/** @var int */
	private $projectId;
	/** @var int|null */
	private $adminUserId;
	/** @var string|null */
	private $feedUrl;
	/** @var string|null */
	private $login;
	/** @var string|null */
	private $password;
	/** @var string|null */
	private $note;
	/** @var bool */
	private $regular = true;
	/** @var \DateTime|null */
	private $closed;

	/**
	 * @param int $projectId
	 */
	public function __construct(int $projectId)
	{
		$this->projectId = $projectId;
	}

	/**
	 * @return int
	 */
	public function getProjectId(): int
	{
		return $this->projectId;
	}

	/**
	 * @return int|null
	 */
	public function getAdminUserId()
	{
		return $this->adminUserId;
	}

	/**
	 * @param int|null $adminUserId
	 * @return $this
	 */
	public function adminUserId(int $adminUserId = null)
	{
		$this->adminUserId = $adminUserId;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getFeedUrl()
	{
		return $this->feedUrl;
	}

	/**
	 * @param string|null $feedUrl
	 * @return $this
	 */
	public function feedUrl(string $feedUrl = null)
	{
		$this->feedUrl = $feedUrl;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getLogin()
	{
		return $this->login;
	}

	/**
	 * @param string|null $login
	 * @return $this
	 */
	public function login(string $login = null)
	{
		$this->login = $login;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getPassword()
	{
		return $this->password;
	}

	/**
	 * @param string|null $password
	 * @return $this
	 */
	public function password(string $password = null)
	{
		$this->password = $password;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getNote()
	{
		return $this->note;
	}

	/**
	 * @param string|null $note
	 * @return $this
	 */
	public function note(string $note = null)
	{
		$this->note = $note;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function getRegular(): bool
	{
		return $this->regular;
	}

	/**
	 * @param bool $regular
	 * @return $this
	 */
	public function regular(bool $regular = true)
	{
		$this->regular = $regular;
		return $this;
	}

	/**
	 * @return \DateTime|null
	 */
	public function getClosed()
	{
		return $this->closed;
	}

	/**
	 * @param \DateTime|null $closed
	 * @return $this
	 */
	public function closed(\DateTime $closed = null)
	{
		$this->closed = $closed;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function generateId(): bool
	{
		return !SupplierInquiry::isIdGeneratedByStorage();
	}

	/**
	 * @return SupplierInquiry
	 */
	public function build(): SupplierInquiry
	{
		return new SupplierInquiry($this);
	}

	/**
	 * @param int $projectId
	 * @return self
	 */
	public static function create(int $projectId): self
	{
		return new self($projectId);
	}
}