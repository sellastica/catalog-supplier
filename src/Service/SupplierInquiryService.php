<?php
namespace Sellastica\CatalogSupplier\Service;

class SupplierInquiryService
{
	/** @var \Sellastica\Entity\EntityManager */
	private $em;
	/** @var \Nette\Localization\ITranslator */
	private $translator;


	/**
	 * @param \Sellastica\Entity\EntityManager $em
	 * @param \Nette\Localization\ITranslator $translator
	 */
	public function __construct(
		\Sellastica\Entity\EntityManager $em,
		\Nette\Localization\ITranslator $translator
	)
	{
		$this->em = $em;
		$this->translator = $translator;
	}

	/**
	 * @param int $id
	 * @return null|\Sellastica\CatalogSupplier\Entity\SupplierInquiry
	 */
	public function find(int $id): ?\Sellastica\CatalogSupplier\Entity\SupplierInquiry
	{
		return $this->em->getRepository(\Sellastica\CatalogSupplier\Entity\SupplierInquiry::class)->find($id);
	}

	/**
	 * @param array $filter
	 * @param \Sellastica\Entity\Configuration|null $configuration
	 * @return \Sellastica\CatalogSupplier\Entity\SupplierInquiryCollection|\Sellastica\CatalogSupplier\Entity\SupplierInquiry[]
	 */
	public function findBy(
		array $filter,
		\Sellastica\Entity\Configuration $configuration = null
	): \Sellastica\CatalogSupplier\Entity\SupplierInquiryCollection
	{
		return $this->em->getRepository(\Sellastica\CatalogSupplier\Entity\SupplierInquiry::class)
			->findBy($filter, $configuration);
	}

	/**
	 * @param \Sellastica\Identity\Model\Contact $contact
	 * @param string $supplier
	 * @return \Sellastica\CatalogSupplier\Entity\SupplierInquiry
	 */
	public function create(
		\Sellastica\Identity\Model\Contact $contact,
		string $supplier
	): \Sellastica\CatalogSupplier\Entity\SupplierInquiry
	{
		$inquiry = \Sellastica\CatalogSupplier\Entity\SupplierInquiryBuilder::create($contact, $supplier)
			->build();
		$this->em->persist($inquiry);

		return $inquiry;
	}
}