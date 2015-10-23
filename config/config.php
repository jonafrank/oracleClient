<?php
ini_set('max_execution_time', 300);
$app['debug'] = true;
// Database.
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
	'db.options' => array(
		'driver'   => 'oci8',
		'host'	   => null,
		'dbname'   => '', //Dbname Or TNS entry
		'service'  => true,
		'user'     => '',
		'password' => '',
		'charset'  => 'UTF8'
	)
));
//Templating
$app->register(new \Silex\Provider\TwigServiceProvider(), array(
	'twig.path' => __DIR__ . '/../templates',
));
//Session
$app->register(new \Silex\Provider\SessionServiceProvider());

//Memcached
$app['memcached'] = new \MemcachedManager\MemcachedHandler('oracleViewer');
