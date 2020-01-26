<?php
namespace Sellastica\CatalogSupplier\Entity\B2bPartner\Mapping;

/**
 * @see \Sellastica\CatalogSupplier\Entity\B2bPartner\Entity\B2bPartner
 */
class B2bPartnerDibiMapper extends \Sellastica\Entity\Mapping\DibiMapper
{
	use \Sellastica\DataGrid\Mapping\Dibi\TFilterRulesDibiMapper;

	/**
	 * @return bool
	 */
	protected function isInCrmDatabase(): bool
	{
		return true;
	}

	/**
	 * @param bool $databaseName
	 * @return string
	 */
	protected function getTableName($databaseName = false): string
	{
		return ($databaseName ? $this->environment->getNapojseCrmDatabaseName() . '.' : '')
			. 'b2b_partner';
	}
}