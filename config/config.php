<?php
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
	'db.options' => array(
		'driver'   => 'oci8',
		'host'	   => '~',
		'dbname'   => '(DESCRIPTION=(enable=broken)(LOAD_BALANCE=yes)(ADDRESS=(PROTOCOL=TCP)(HOST=nodspddb5-v.ea.com)(PORT=1521))(ADDRESS=(PROTOCOL=TCP)(HOST=nodspddb6-v.ea.com)(PORT=1521))(ADDRESS=(PROTOCOL=TCP)(HOST=nodspddb7-v.ea.com)(PORT=1521))(ADDRESS=(PROTOCOL=TCP)(HOST=nodspddb8-v.ea.com)(PORT=1521))(CONNECT_DATA=(SERVICE_NAME=ODSPD)(failover_mode=(type=select)(method=basic))))',
		'service'  => true,
		'user'     => 'MDML_READ',
		'password' => 'Tally56740',
		'charset'  => 'UTF8'
	)
));