<?php
namespace Sellastica\CatalogSupplier\Service;

class InstalledCatalogApplicationService
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
	 * @param \Sellastica\CatalogSupplier\Entity\CatalogFeed $catalogFeed
	 * @param \Sellastica\CatalogSupplier\Entity\CatalogApplication $catalogApplication
	 * @param \Sellastica\Project\Entity\Project $project
	 * @return null|\Sellastica\CatalogSupplier\Entity\InstalledCatalogApplication
	 */
	public function find(
		\Sellastica\CatalogSupplier\Entity\CatalogFeed $catalogFeed,
		\Sellastica\CatalogSupplier\Entity\CatalogApplication $catalogApplication,
		\Sellastica\Project\Entity\Project $project
	): ?\Sellastica\CatalogSupplier\Entity\InstalledCatalogApplication
	{
		return $this->em->getRepository(\Sellastica\CatalogSupplier\Entity\InstalledCatalogApplication::class)->findOneBy([
			'catalogFeedId' => $catalogFeed->getId(),
			'applicationId' => $catalogApplication->getId(),
			'projectId' => $project->getId(),
		]);
	}

	/**
	 * @param \Sellastica\CatalogSupplier\Entity\CatalogFeed $catalogFeed
	 * @param \Sellastica\CatalogSupplier\Entity\CatalogApplication $catalogApplication
	 * @param \Sellastica\Project\Entity\Project $project
	 * @return bool
	 */
	public function isInstalled(
		\Sellastica\CatalogSupplier\Entity\CatalogFeed $catalogFeed,
		\Sellastica\CatalogSupplier\Entity\CatalogApplication $catalogApplication,
		\Sellastica\Project\Entity\Project $project
	): bool
	{
		return $this->em->getRepository(\Sellastica\CatalogSupplier\Entity\InstalledCatalogApplication::class)->existsBy([
			'catalogFeedId' => $catalogFeed->getId(),
			'applicationId' => $catalogApplication->getId(),
			'projectId' => $project->getId(),
		]);
	}

	/**
	 * @param \Sellastica\CatalogSupplier\Entity\CatalogFeed $catalogFeed
	 * @param \Sellastica\CatalogSupplier\Entity\CatalogApplication $catalogApplication
	 * @param \Sellastica\Project\Entity\Project $project
	 * @param array $options
	 * @return \Sellastica\CatalogSupplier\Entity\InstalledCatalogApplication
	 */
	public function install(
		\Sellastica\CatalogSupplier\Entity\CatalogFeed $catalogFeed,
		\Sellastica\CatalogSupplier\Entity\CatalogApplication $catalogApplication,
		\Sellastica\Project\Entity\Project $project,
		array $options = []
	): \Sellastica\CatalogSupplier\Entity\InstalledCatalogApplication
	{
		$catalogFeedApplication = \Sellastica\CatalogSupplier\Entity\InstalledCatalogApplicationBuilder::create(
			$catalogApplication->getId(),
			$catalogFeed->getId(),
			$project->getId()
		)->options($options)
			->build();
		$this->em->persist($catalogFeedApplication);

		return $catalogFeedApplication;
	}

	/**
	 * @param \Sellastica\CatalogSupplier\Entity\CatalogFeed $catalogFeed
	 * @param \Sellastica\CatalogSupplier\Entity\CatalogApplication $catalogApplication
	 * @param \Sellastica\Project\Entity\Project $project
	 */
	public function uninstall(
		\Sellastica\CatalogSupplier\Entity\CatalogFeed $catalogFeed,
		\Sellastica\CatalogSupplier\Entity\CatalogApplication $catalogApplication,
		\Sellastica\Project\Entity\Project $project
	): void
	{
		if ($catalogFeedApplication = $this->find($catalogFeed, $catalogApplication, $project)) {
			$this->em->remove($catalogFeedApplication);
		}
	}
}