<?php
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
$app = new Silex\Application();

include_once __DIR__ . '/../config/config.php';

$app->get('/franchises', function (Request $request) use ($app) {
    $sql = "SELECT * FROM ODS_MDM_FRANCHISE_V";
    $result = $app['db']->fetchAssoc($sql);
    die(var_dump($result));
    return new JsonResponse($result);

});

$app->run();
