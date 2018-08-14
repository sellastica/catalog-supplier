<?php
namespace Sellastica\CatalogSupplier\Entity;

/**
 * @generate-builder
 * @see SupplierInquiryBuilder
 */
class SupplierInquiry extends \Sellastica\Entity\Entity\AbstractEntity
	implements \Sellastica\Entity\Entity\IEntity
{
	use \Sellastica\Entity\Entity\TAbstractEntity;

	/** @var \Sellastica\Identity\Model\Contact @required */
	private $contact;
	/** @var string @required */
	private $supplier;
	/** @var string|null @optional */
	private $supplierHomepage;
	/** @var string|null @optional */
	private $supplierEmail;
	/** @var string|null @optional */
	private $supplierPhone;
	/** @var string|null @optional */
	private $feedUrl;
	/** @var string|null @optional */
	private $note;


	/**
	 * @param SupplierInquiryBuilder $builder
	 */
	public function __construct(SupplierInquiryBuilder $builder)
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
	 * @return \Sellastica\Identity\Model\Contact
	 */
	public function getContact(): \Sellastica\Identity\Model\Contact
	{
		return $this->contact;
	}

	/**
	 * @param \Sellastica\Identity\Model\Contact $contact
	 */
	public function setContact(\Sellastica\Identity\Model\Contact $contact): void
	{
		$this->contact = $contact;
	}

	/**
	 * @return string
	 */
	public function getSupplier(): string
	{
		return $this->supplier;
	}

	/**
	 * @param string $supplier
	 */
	public function setSupplier(string $supplier): void
	{
		$this->supplier = $supplier;
	}

	/**
	 * @return null|string
	 */
	public function getFeedUrl(): ?string
	{
		return $this->feedUrl;
	}

	/**
	 * @param null|string $feedUrl
	 */
	public function setFeedUrl(?string $feedUrl): void
	{
		$this->feedUrl = $feedUrl;
	}

	/**
	 * @return null|string
	 */
	public function getNote(): ?string
	{
		return $this->note;
	}

	/**
	 * @param null|string $note
	 */
	public function setNote(?string $note): void
	{
		$this->note = $note;
	}

	/**
	 * @return array
	 */
	public function toArray(): array
	{
		return array_merge(
			$this->parentToArray(),
			$this->getContact()->toArray(),
			[
				'supplier' => $this->supplier,
				'supplierHomepage' => $this->supplierHomepage,
				'supplierEmail' => $this->supplierEmail,
				'supplierPhone' => $this->supplierPhone,
				'feedUrl' => $this->feedUrl,
				'note' => $this->note,
			]
		);
	}
}