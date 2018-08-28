<?php
namespace Sellastica\CatalogSupplier\Model;

class DataType
{
	const XML = 'xml',
		XML_WITH_ATTRIBUTES = 'xml_with_attributes';

	/** @var string */
	private $value;


	/**
	 * @param string $value
	 */
	private function __construct(string $value)
	{
		$this->value = $value;
	}

	/**
	 * @return string
	 */
	public function getValue(): string
	{
		return $this->value;
	}

	/**
	 * @param string $type
	 * @return DataType
	 */
	public static function from(string $type): DataType
	{
		$rc = new \ReflectionClass(DataType::class);
		if (!in_array($type, $rc->getConstants())) {
			throw new \InvalidArgumentException("Unknown export format $type");
		}

		return new self($type);
	}

	/**
	 * @return DataType[]
	 */
	public static function getAll(): array
	{
		$return = [];
		$rc = new \ReflectionClass(DataType::class);
		foreach ($rc->getConstants() as $constant) {
			$return[] = new self($constant);
		}

		return $return;
	}
}
