<?php
use Symfony\Component\HttpFoundation\Request;

$app = new Silex\Application();

include_once __DIR__ . '/../config/config.php';

$app->get('/', function(Request $request) use ($app){
    $query = $app['session']->get('query');
    return $app['twig']->render('index.twig', array('query' => $query));
});

$app->post('/execute', function(Request $request) use ($app) {
    $query = $request->request->get('query');
    $app['session']->set('query', $query);
    try {
        $stmt = $app['db']->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $app['twig']->render('table-result.twig', array(
            'items'   => $result,
            'columns' => array_keys($result[0]),
            'query'   => $query
        ));
    } catch (Exception $e) {
        $app['session']->getFlashBag()->add('error', $e->getMessage());
        return $app->redirect('/');
    }

});


$app->run();
