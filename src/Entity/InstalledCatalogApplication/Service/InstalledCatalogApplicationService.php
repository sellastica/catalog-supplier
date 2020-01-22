<?php
namespace Sellastica\CatalogSupplier\Service;

class InstalledCatalogApplicationService
{
	/** @var \Sellastica\Entity\EntityManager */
	private $em;
	/** @var \Nette\Localization\ITranslator */
	private $translator;
	/** @var \Suppliers\Application\UninstallerFactory */
	private $uninstallerFactory;


	/**
	 * @param \Sellastica\Entity\EntityManager $em
	 * @param \Nette\Localization\ITranslator $translator
	 * @param \Suppliers\Application\UninstallerFactory $uninstallerFactory
	 */
	public function __construct(
		\Sellastica\Entity\EntityManager $em,
		\Nette\Localization\ITranslator $translator,
		\Suppliers\Application\UninstallerFactory $uninstallerFactory
	)
	{
		$this->em = $em;
		$this->translator = $translator;
		$this->uninstallerFactory = $uninstallerFactory;
	}

	/**
	 * @param \Sellastica\CatalogSupplier\Entity\CatalogApplication $catalogApplication
	 * @param \Sellastica\Project\Entity\Project $project
	 * @param \Sellastica\CatalogSupplier\Entity\CatalogFeed|null $catalogFeed
	 * @return null|\Sellastica\CatalogSupplier\Entity\InstalledCatalogApplication
	 */
	public function find(
		\Sellastica\CatalogSupplier\Entity\CatalogApplication $catalogApplication,
		\Sellastica\Project\Entity\Project $project,
		\Sellastica\CatalogSupplier\Entity\CatalogFeed $catalogFeed = null
	): ?\Sellastica\CatalogSupplier\Entity\InstalledCatalogApplication
	{
		return $this->em->getRepository(\Sellastica\CatalogSupplier\Entity\InstalledCatalogApplication::class)->findOneBy([
			'catalogFeedId' => $catalogFeed ? $catalogFeed->getId() : null,
			'applicationId' => $catalogApplication->getId(),
			'projectId' => $project->getId(),
		]);
	}

	/**
	 * @param \Sellastica\CatalogSupplier\Entity\CatalogApplication $catalogApplication
	 * @param \Sellastica\Project\Entity\Project $project
	 * @param \Sellastica\CatalogSupplier\Entity\CatalogFeed|null $catalogFeed
	 * @return bool
	 */
	public function isInstalled(
		\Sellastica\CatalogSupplier\Entity\CatalogApplication $catalogApplication,
		\Sellastica\Project\Entity\Project $project,
		\Sellastica\CatalogSupplier\Entity\CatalogFeed $catalogFeed = null
	): bool
	{
		return $this->em->getRepository(\Sellastica\CatalogSupplier\Entity\InstalledCatalogApplication::class)->existsBy([
			'catalogFeedId' => $catalogFeed ? $catalogFeed->getId() : null,
			'applicationId' => $catalogApplication->getId(),
			'projectId' => $project->getId(),
		]);
	}

	/**
	 * @param \Sellastica\CatalogSupplier\Entity\CatalogApplication $catalogApplication
	 * @param \Sellastica\Project\Entity\Project $project
	 * @param \Sellastica\CatalogSupplier\Entity\CatalogFeed|null $catalogFeed
	 * @param array $options
	 * @return \Sellastica\CatalogSupplier\Entity\InstalledCatalogApplication
	 */
	public function install(
		\Sellastica\CatalogSupplier\Entity\CatalogApplication $catalogApplication,
		\Sellastica\Project\Entity\Project $project,
		\Sellastica\CatalogSupplier\Entity\CatalogFeed $catalogFeed = null,
		array $options = []
	): \Sellastica\CatalogSupplier\Entity\InstalledCatalogApplication
	{
		$catalogFeedApplication = \Sellastica\CatalogSupplier\Entity\InstalledCatalogApplicationBuilder::create(
			$catalogApplication->getId(),
			$catalogFeed ? $catalogFeed->getId() : null,
			$project->getId()
		)->options($options)
			->build();
		$this->em->persist($catalogFeedApplication);

		return $catalogFeedApplication;
	}

	/**
	 * @param \Sellastica\CatalogSupplier\Entity\CatalogApplication $catalogApplication
	 * @param \Sellastica\Project\Entity\Project $project
	 * @param \Sellastica\CatalogSupplier\Entity\CatalogFeed|null $catalogFeed
	 */
	public function uninstall(
		\Sellastica\CatalogSupplier\Entity\CatalogApplication $catalogApplication,
		\Sellastica\Project\Entity\Project $project,
		\Sellastica\CatalogSupplier\Entity\CatalogFeed $catalogFeed = null
	): void
	{
		if ($catalogFeedApplication = $this->find($catalogApplication, $project, $catalogFeed)) {
			$this->em->remove($catalogFeedApplication);
		}

		if ($uninstaller = $this->uninstallerFactory->create($catalogApplication, $project)) {
			$uninstaller->uninstall();
		}
	}
}