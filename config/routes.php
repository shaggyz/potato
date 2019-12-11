<?php

return [
    // Http  // Route        // Action
    ['GET',  '/',            'HomeController::index'],
    ['GET',  '/restricted',  'HomeController::restricted'],
    ['GET',  '/template',    'HomeController::template'],
];
