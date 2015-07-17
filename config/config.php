<?php
ini_set('max_execution_time', 300);
$app['debug'] = true;
// Database.
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
	'db.options' => array(
		'driver'   => 'oci8',
		'host'	   => null,
		'dbname'   => '(DESCRIPTION=(LOAD_BALANCE=yes)(ADDRESS=(PROTOCOL=TCP)(HOST=odspddb.scan.rws.ad.ea.com)(PORT=1521))(CONNECT_DATA=(SERVICE_NAME=ODSPD)(failover_mode=(type=select)(method=basic))))',
		'service'  => true,
		'user'     => 'MDML_READ',
		'password' => 'newmdmlread#2welcome',
		'charset'  => 'UTF8'
	)
));
//Templating
$app->register(new \Silex\Provider\TwigServiceProvider(), array(
	'twig.path' => __DIR__ . '/../templates',
));
//Session
$app->register(new \Silex\Provider\SessionServiceProvider());