<?php
/**
 * show-me-the-objects.php
 *
 * @author Dana Luther <dluther@envisageinternational.com>
 * @link https://packagist.org/packages/yiisoft/di
 */
require 'vendor/autoload.php';

use Yiisoft\Di\Container;

$container = new Container([
//	\Example\SampleObjectConstructed::class        => [
//		'class'         => \Example\SampleObjectConstructed::class,
//		'__construct()' => [$_ENV['MY_SECRET_KEY']]
//	],
	\Example\SampleObjectConstructed::class        => [
		'class'         => \Example\SampleObjectConstructed::class,
		'__construct()' => [file_get_contents('/run/secrets/hiddenkey')]
	],
	\Example\PartnerConfigIdentifier::OPT_CONFIG_1 => [
		'class'         => \Example\SampleObjectConstructed::class,
		'__construct()' => [file_get_contents('/run/secrets/hiddenkey2')]
	],
	\Example\PartnerConfigIdentifier::OPT_CONFIG_2 => [
		'class'         => \Example\SampleObjectConstructed::class,
		'__construct()' => ['You can read me in the source repo.']
	],
]);

echo '<html><head><title>Objects - PHP ' . phpversion() . '</title></head>';
echo '<body style="font-size: 1.25rem; font-family: sans-serif">';

$objects = [
	'public key property'                => new \Example\SampleObject(),
	'public via DI'                      => $container->get(\Example\SampleObject::class),
	'private key property'               => new \Example\SampleObjectMoreSecure(),
	'constructed protected key (passed)' => new \Example\SampleObjectConstructed('Someothervalue'),
	'constructed protected key (env)'    => new \Example\SampleObjectConstructed($_ENV['MY_SECRET_KEY']),
	'constructed protected key (secret)' => new \Example\SampleObjectConstructed(file_get_contents('/run/secrets/hiddenkey')),
	'constructed via DI'                 => $container->get(\Example\SampleObjectConstructed::class),
	'constructed via DI 2'               => $container->get(\Example\PartnerConfigIdentifier::OPT_CONFIG_1),
	'constructed via DI 3'               => $container->get(\Example\PartnerConfigIdentifier::OPT_CONFIG_2),
];

foreach ($objects as $key => $obj)
{
	echo '<h3>' . get_class($obj) . ': <small style="font-style: italic;">' . $key . '</small></h3>';
	echo '<pre>';
	var_dump($obj);
	echo '</pre>';
}

echo '<pre>';
echo \Example\PartnerConfigIdentifier::OPT_CONFIG_2;
echo '</pre>';

echo '</body></html>';