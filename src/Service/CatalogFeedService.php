<?php
namespace Sellastica\CatalogSupplier\Service;

class CatalogFeedService
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
	 * @return null|\Sellastica\CatalogSupplier\Entity\CatalogFeed
	 */
	public function find(int $id): ?\Sellastica\CatalogSupplier\Entity\CatalogFeed
	{
		return $this->em->getRepository(\Sellastica\CatalogSupplier\Entity\CatalogFeed::class)->find($id);
	}

	/**
	 * @param int $id
	 * @return null|\Sellastica\CatalogSupplier\Entity\CatalogFeed
	 */
	public function get(int $id): ?\Sellastica\CatalogSupplier\Entity\CatalogFeed
	{
		if (!$catalogFeed = $this->find($id)) {
			throw new \Suppliers\Exception\SuppliersException($this->translator->translate(
				'apps.suppliers.notices.catalog_supplier_not_found'
			));
		}

		return $catalogFeed;
	}

	/**
	 * @param \Sellastica\Entity\Configuration|null $configuration
	 * @return \Sellastica\CatalogSupplier\Entity\CatalogFeedCollection|\Sellastica\CatalogSupplier\Entity\CatalogFeed[]
	 */
	public function findAll(
		\Sellastica\Entity\Configuration $configuration = null
	): \Sellastica\CatalogSupplier\Entity\CatalogFeedCollection
	{
		return $this->em->getRepository(\Sellastica\CatalogSupplier\Entity\CatalogFeed::class)
			->findAll($configuration);
	}

	/**
	 * @param \Sellastica\Entity\Configuration|null $configuration
	 * @return \Sellastica\CatalogSupplier\Entity\CatalogFeedCollection|\Sellastica\CatalogSupplier\Entity\CatalogFeed[]
	 */
	public function findAllVisible(
		\Sellastica\Entity\Configuration $configuration = null
	): \Sellastica\CatalogSupplier\Entity\CatalogFeedCollection
	{
		return $this->findBy(['visible' => true, 'updateOnly' => false], $configuration);
	}

	/**
	 * @param array $filter
	 * @param \Sellastica\Entity\Configuration|null $configuration
	 * @return \Sellastica\CatalogSupplier\Entity\CatalogFeedCollection|\Sellastica\CatalogSupplier\Entity\CatalogFeed[]
	 */
	public function findBy(
		array $filter,
		\Sellastica\Entity\Configuration $configuration = null
	): \Sellastica\CatalogSupplier\Entity\CatalogFeedCollection
	{
		return $this->em->getRepository(\Sellastica\CatalogSupplier\Entity\CatalogFeed::class)
			->findBy($filter, $configuration);
	}
}