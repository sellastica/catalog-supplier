<?php
namespace Sellastica\CatalogSupplier\Model;

class Credentials
{
	/** @var string|null */
	private $url;
	/** @var int|null */
	private $port;
	/** @var string|null */
	private $login;
	/** @var string|null */
	private $password;
	/** @var string|null */
	private $root;
	/** @var string|null */
	private $filename;


	/**
	 * @return string|null
	 */
	public function getUrl(): ?string
	{
		return $this->url;
	}

	/**
	 * @param string|null $url
	 */
	public function setUrl(?string $url): void
	{
		$this->url = $url;
	}

	/**
	 * @return int|null
	 */
	public function getPort(): ?int
	{
		return $this->port;
	}

	/**
	 * @param int|null $port
	 */
	public function setPort(?int $port): void
	{
		$this->port = $port;
	}

	/**
	 * @return null|string
	 */
	public function getLogin(): ?string
	{
		return $this->login;
	}

	/**
	 * @param null|string $login
	 */
	public function setLogin(?string $login): void
	{
		$this->login = $login;
	}

	/**
	 * @return null|string
	 */
	public function getPassword(): ?string
	{
		return $this->password;
	}

	/**
	 * @param null|string $password
	 */
	public function setPassword(?string $password): void
	{
		$this->password = $password;
	}

	/**
	 * @return string|null
	 */
	public function getRoot(): ?string
	{
		return $this->root;
	}

	/**
	 * @param string|null $root
	 */
	public function setRoot(?string $root): void
	{
		$this->root = $root;
	}

	/**
	 * @return string|null
	 */
	public function getFilename(): ?string
	{
		return $this->filename;
	}

	/**
	 * @param string|null $filename
	 */
	public function setFilename(?string $filename): void
	{
		$this->filename = $filename;
	}
}
