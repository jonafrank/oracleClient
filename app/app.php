<?php
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

$app = new Silex\Application();

include_once __DIR__ . '/../config/config.php';

/**
 * Render the main Page
 */
$app->get('/', function(Request $request) use ($app){
    $query = $app['session']->get('query');
    return $app['twig']->render('index.twig', array('query' => $query));
});

/**
 * GET the available views
 */
$app->get('/views', function(Request $request) use ($app){
    $result = unserialize($app['memcached']->get('viewlist'));
    if (!$result) {
        $sql = "SELECT view_name FROM all_views ORDER BY view_name ASC";
        $stmt = $app['db']->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $app['memcached']->set('viewlist', serialize($result));
    }
    return new JsonResponse($result);
});
/**
 * Execute an Oracle Query
 */
$app->post('/execute', function(Request $request) use ($app) {
    $query = $request->request->get('query');
    $app['session']->set('query', $query);
    try {
        $stmt = $app['db']->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return new JsonResponse(array('query' => $query, 'result' => $result));
    } catch (Exception $e) {
        return new JsonResponse(array('error' => $e->getMessage()), $e->getCode());
    }
});



$app->run();
