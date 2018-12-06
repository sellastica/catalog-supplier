<?php
namespace Sellastica\CatalogCategory\Presentation;

class CatalogCategories extends \Sellastica\Twig\Model\TwigObject
{
	/** @var \Sellastica\CatalogSupplier\Entity\ICatalogCategoryRepository */
	private $repository;
	/** @var \Package\Twig\Debugger\ErrorHandler */
	private $errorHandler;
	/** @var \Sellastica\Entity\EntityManager */
	private $em;


	/**
	 * @param \Sellastica\CatalogSupplier\Entity\ICatalogCategoryRepository $repository
	 * @param \Package\Twig\Debugger\ErrorHandler $errorHandler
	 * @param \Sellastica\Entity\EntityManager $em
	 */
	public function __construct(
		\Sellastica\CatalogSupplier\Entity\ICatalogCategoryRepository $repository,
		\Package\Twig\Debugger\ErrorHandler $errorHandler,
		\Sellastica\Entity\EntityManager $em
	)
	{
		$this->repository = $repository;
		$this->errorHandler = $errorHandler;
		$this->em = $em;
	}

	/**
	 * Finds article by handle
	 * @param int $id
	 * @return CatalogCategoryProxy|null
	 */
	public function getId($id = null): ?CatalogCategoryProxy
	{
		if (($convertedId = \Sellastica\Utils\Conversions::toInt($id)) === false) {
			$this->errorHandler->getAssertionHandler()->intError($id, __FUNCTION__);
			return null;
		}

		/** @var \Sellastica\Entity\Entity\IEntity|\Sellastica\Twig\Model\IProxable $entity */
		$entity = $this->repository->findPublishable($convertedId);
		return isset($entity) ? $entity->toProxy() : null;
	}

	/**
	 * @return \Sellastica\Twig\Model\ArrayProxy
	 */
	public function getAll(): \Sellastica\Twig\Model\ArrayProxy
	{
		$suppliers = new \Sellastica\Twig\Model\ArrayProxy();
		/** @var \Sellastica\CatalogSupplier\Entity\CatalogCategory $supplier */
		foreach ($this->em->getRepository(\Sellastica\CatalogSupplier\Entity\CatalogCategory::class)
					 ->findAllPublishable(\Sellastica\Entity\Configuration::sortBy('title')) as $supplier) {
			$suppliers[] = $supplier->toProxy();
		}

		return $suppliers;
	}

	/**
	 * @return string
	 */
	public function getShortName(): string
	{
		return 'supplier_categories';
	}

	/**
	 * @return array
	 */
	public function getAllowedProperties(): array
	{
		return [
			'all',
			'id',
		];
	}
}
