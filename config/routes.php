<?php

return [
    // Http  // Route        // Action
    ['GET',  '/',            'HomeController::index'],
    ['GET',  '/restricted',  'HomeController::restricted'],
    ['GET',  '/template',    'HomeController::template'],
    ['GET',  '/database',    'HomeController::database'],
    ['GET',  '/json',        'HomeController::json'],
];
