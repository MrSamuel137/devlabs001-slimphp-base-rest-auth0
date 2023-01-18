<?php
// Routes
$app->group('/api', function (\Slim\App $app) {
    $app->get('/1', App\Action\HomeAction::class);
    $app->get('/2', App\Action\HomeAction2::class);
})->add(App\Service\TokenAuthValidate::class);