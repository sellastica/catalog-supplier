<?php
namespace Sellastica\CatalogSupplier\Service;

class CatalogApplicationService
{
	const
		UPDATE_STOCK = 'update_stock',
		ORDERS = 'orders',
		CNB = 'cnb',
		FTP = 'ftp';

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
	 * @return null|\Sellastica\CatalogSupplier\Entity\CatalogApplication
	 */
	public function find(int $id): ?\Sellastica\CatalogSupplier\Entity\CatalogApplication
	{
		return $this->em->getRepository(\Sellastica\CatalogSupplier\Entity\CatalogApplication::class)->find($id);
	}

	/**
	 * @param string $code
	 * @return null|\Sellastica\CatalogSupplier\Entity\CatalogApplication
	 */
	public function findOneByCode(string $code): ?\Sellastica\CatalogSupplier\Entity\CatalogApplication
	{
		return $this->em->getRepository(\Sellastica\CatalogSupplier\Entity\CatalogApplication::class)->findOneBy([
			'code' => $code,
		]);
	}

	/**
	 * @param array $filter
	 * @return null|\Sellastica\CatalogSupplier\Entity\CatalogApplication
	 */
	public function findOneBy(array $filter): ?\Sellastica\CatalogSupplier\Entity\CatalogApplication
	{
		return $this->em->getRepository(\Sellastica\CatalogSupplier\Entity\CatalogApplication::class)->findOneBy($filter);
	}

	/**
	 * @param \Sellastica\Entity\Configuration|null $configuration
	 * @return \Sellastica\CatalogSupplier\Entity\CatalogApplicationCollection|\Sellastica\CatalogSupplier\Entity\CatalogApplication[]
	 */
	public function findAll(
		\Sellastica\Entity\Configuration $configuration = null
	): \Sellastica\CatalogSupplier\Entity\CatalogApplicationCollection
	{
		return $this->em->getRepository(\Sellastica\CatalogSupplier\Entity\CatalogApplication::class)
			->findAll($configuration);
	}

	/**
	 * @param \Sellastica\Entity\Configuration|null $configuration
	 * @return \Sellastica\CatalogSupplier\Entity\CatalogApplicationCollection|\Sellastica\CatalogSupplier\Entity\CatalogApplication[]
	 */
	public function findAllVisible(
		\Sellastica\Entity\Configuration $configuration = null
	): \Sellastica\CatalogSupplier\Entity\CatalogApplicationCollection
	{
		return $this->findBy(['visible' => true], $configuration);
	}

	/**
	 * @param array $filter
	 * @param \Sellastica\Entity\Configuration|null $configuration
	 * @return \Sellastica\CatalogSupplier\Entity\CatalogApplicationCollection|\Sellastica\CatalogSupplier\Entity\CatalogApplication[]
	 */
	public function findBy(
		array $filter,
		\Sellastica\Entity\Configuration $configuration = null
	): \Sellastica\CatalogSupplier\Entity\CatalogApplicationCollection
	{
		return $this->em->getRepository(\Sellastica\CatalogSupplier\Entity\CatalogApplication::class)
			->findBy($filter, $configuration);
	}
}