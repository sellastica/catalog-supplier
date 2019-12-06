<?php
namespace Sellastica\CatalogSupplier\Model\Console;

abstract class AbstractCommandGenerator
{
	/** @var string */
	protected $baseDir = '~/Projects/Napojse/Admin';
	/** @var string */
	protected $userAgent = 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:63.0) Gecko/20100101 Firefox/63.0';


	/**
	 * @param string $path
	 * @return string
	 */
	protected function createAbsolutePath(string $path): string
	{
		return $this->baseDir . '/' . $path;
	}

	/**
	 * @param string $path
	 * @return string
	 */
	protected function createRelativePath(string $path): string
	{
		return "./$path";
	}

	/**
	 * @param string $comment
	 * @return string
	 */
	protected function comment(string $comment): string
	{
		return "#$comment"
			. $this->htmlBreak();
	}

	/**
	 * @param int $count
	 * @return string
	 */
	protected function htmlBreak(int $count = 1): string
	{
		return str_repeat('<br>', $count);
	}

	/**
	 * @param int $count
	 * @return string
	 */
	protected function phpBreak(int $count = 1): string
	{
		return str_repeat(PHP_EOL, $count);
	}

	/**
	 * @param string $path
	 * @return string
	 */
	protected function mkdir(string $path): string
	{
		return 'mkdir -p ' . $path;
	}

	/**
	 * @param string $from
	 * @param string $to
	 * @return string
	 */
	protected function cp(string $from, string $to): string
	{
		return "cp $from $to";
	}

	/**
	 * @param string $path
	 * @return string
	 */
	protected function cd(string $path): string
	{
		return 'cd ' . $path;
	}

	/**
	 * @param string $from
	 * @param string $to
	 * @param string|null $login
	 * @param string|null $password
	 * @return string
	 */
	protected function wget(
		string $from,
		string $to,
		string $login = null,
		string $password = null
	): string
	{
		$return = sprintf('wget -O "%s" "%s" --user-agent="%s" --no-check-certificate', $to, $from, $this->userAgent);
		if (isset($login)) {
			$return .= sprintf(' --user="%s"', $login);
		}

		if (isset($password)) {
			$return .= sprintf(' --password="%s"', $password);
		}

		return $return;
	}

	/**
	 * @param string $from
	 * @param string $to
	 * @return string
	 */
	protected function trang(
		string $from,
		string $to
	): string
	{
		return sprintf('trang -o indent=4 "%s" "%s"', $from, $to);
	}

	/**
	 * @param string $from
	 * @param string $to
	 * @return string
	 */
	protected function xml_pp(
		string $from,
		string $to
	): string
	{
		return sprintf('xml_pp "%s" > "%s"', $from, $to);
	}

	/**
	 * @param string $path
	 * @return string
	 */
	protected function removeFile(string $path): string
	{
		return sprintf('rm -f "%s"', $path);
	}

	/**
	 * @param string $path
	 * @return string
	 */
	protected function glogg(string $path): string
	{
		return sprintf('glogg "%s"', $path);
	}

	/**
	 * @param string $path
	 * @return string
	 */
	protected function libreoffice(string $path): string
	{
		return sprintf('libreoffice "%s"', $path);
	}

	/**
	 * @param string $path
	 * @return string
	 */
	protected function phpstorm(string $path): string
	{
		return sprintf('/snap/phpstorm/current/bin/phpstorm.sh "%s"', $path);
	}

	/**
	 * @param string $arguments
	 * @return string
	 */
	protected function php(string $arguments)
	{
		return sprintf('php www/index.php %s', $arguments);
	}
}