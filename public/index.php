<?php

    require_once __DIR__ . '/../includes/app.php';

    use MVC\Router;
    use Controllers\PropController;


    $router = new Router();


    $router->get('/admin', [PropController::class, 'index']);

    $router->get('/propiedades/create', [PropController::class, 'create']);
    $router->post('/propiedades/create', [PropController::class, 'create']);

    $router->get('/propiedades/update', [PropController::class, 'update']);
    $router->post('/propiedades/update', [PropController::class, 'update']);
    
    $router->post('/propiedades/delete', [PropController::class, 'delete']);

    $router->comprobaRutas();
