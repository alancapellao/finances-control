<?php

use App\Controllers\TransactionController;
use App\Models\Error;

$error = new Error();

$routes = [
    'control' => [
        'controller' => TransactionController::class,
        'methods' => [
            'criar' => 'store',
            'deletar' => 'destroy',
            'default' => 'index'
        ]
    ]
];
