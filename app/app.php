<?php

$app = new Silex\Application();

include_once __DIR__ . '/../config/config.php';

$app->get('/hello', function () {
    return 'Hello!';
});

$app->run();
