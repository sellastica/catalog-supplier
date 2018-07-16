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

	/** @var \Sellastica\Identity\Model\Contact */
	private $contact;
	/** @var string */
	private $supplier;
	/** @var string|null */
	private $feedUrl;
	/** @var string|null */
	private $note;

	/**
	 * @param \Sellastica\Identity\Model\Contact $contact
	 * @param string $supplier
	 */
	public function __construct(
		\Sellastica\Identity\Model\Contact $contact,
		string $supplier
	)
	{
		$this->contact = $contact;
		$this->supplier = $supplier;
	}

	/**
	 * @return \Sellastica\Identity\Model\Contact
	 */
	public function getContact(): \Sellastica\Identity\Model\Contact
	{
		return $this->contact;
	}

	/**
	 * @return string
	 */
	public function getSupplier(): string
	{
		return $this->supplier;
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
	 * @param \Sellastica\Identity\Model\Contact $contact
	 * @param string $supplier
	 * @return self
	 */
	public static function create(
		\Sellastica\Identity\Model\Contact $contact,
		string $supplier
	): self
	{
		return new self($contact, $supplier);
	}
}