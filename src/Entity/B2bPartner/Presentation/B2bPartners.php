<?php
namespace Sellastica\CatalogSupplier\Entity\B2bPartner\Presentation;

class B2bPartners extends \Sellastica\Twig\Model\TwigObject
{
	/** @var \Sellastica\CatalogSupplier\Entity\B2bPartner\Entity\IB2bPartnerRepository */
	private $repository;
	/** @var \Package\Twig\Debugger\ErrorHandler */
	private $errorHandler;
	/** @var \Sellastica\Entity\EntityManager */
	private $em;


	/**
	 * @param \Sellastica\CatalogSupplier\Entity\B2bPartner\Entity\IB2bPartnerRepository $repository
	 * @param \Package\Twig\Debugger\ErrorHandler $errorHandler
	 * @param \Sellastica\Entity\EntityManager $em
	 */
	public function __construct(
		\Sellastica\CatalogSupplier\Entity\B2bPartner\Entity\IB2bPartnerRepository $repository,
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
	 * @return B2bPartnerProxy|null
	 */
	public function getId($id = null): ?B2bPartnerProxy
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
	 * @return string
	 */
	public function getShortName(): string
	{
		return 'b2b_partners';
	}

	/**
	 * @return array
	 */
	public function getAllowedProperties(): array
	{
		return [
			'id',
		];
	}
}
