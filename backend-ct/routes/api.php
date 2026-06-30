<?php
    use App\Modules\Auth\Controllers\AuthController;
    use App\Modules\Products\Controllers\ProductionController;

    $router->post('/api/login', [AuthController::class, 'login']);
    $router->post('/api/register', [AuthController::class, 'register']);
    $router->get('/api/products', [ProductionController::class, 'index']);
    $router->post('/api/products', [ProductionController::class, 'store']);