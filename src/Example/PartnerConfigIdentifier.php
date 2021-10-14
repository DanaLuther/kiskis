<?php
/**
 * PartnerConfigIdentifier.php
 *
 * @author Dana Luther <dluther@envisageinternational.com>
 */

namespace Example;

/**
 * This wants to be an enum
 */
class PartnerConfigIdentifier
{
	public const DEFAULT_CONFIG = self::class.':default';
	public const OPT_CONFIG_1 = self::class.':opt1';
	public const OPT_CONFIG_2 = self::class.':opt2';
	public const OPT_CONFIG_3 = self::class.':opt3';
}