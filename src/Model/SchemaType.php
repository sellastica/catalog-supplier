<?php
namespace Sellastica\CatalogSupplier\Model;

class SchemaType
{
	const XSD = 'xsd',
		XSD_WITH_ATTRIBUTES = 'xsd_with_attributes',
		NEON = 'neon';

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
	 * @return SchemaType
	 */
	public static function from(string $type): SchemaType
	{
		$rc = new \ReflectionClass(SchemaType::class);
		if (!in_array($type, $rc->getConstants())) {
			throw new \InvalidArgumentException("Unknown export format $type");
		}

		return new self($type);
	}

	/**
	 * @return SchemaType[]
	 */
	public static function getAll(): array
	{
		$return = [];
		$rc = new \ReflectionClass(SchemaType::class);
		foreach ($rc->getConstants() as $constant) {
			$return[] = new self($constant);
		}

		return $return;
	}
}
