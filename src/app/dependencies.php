<?php
// DIC configuration

$container = $app->getContainer();

// -----------------------------------------------------------------------------
// Service providers
// -----------------------------------------------------------------------------
// -----------------------------------------------------------------------------
// Service factories
// -----------------------------------------------------------------------------
// -----------------------------------------------------------------------------
// Action factories
// -----------------------------------------------------------------------------
$container[App\Action\HomeAction::class] = function ($c) {
    return new App\Action\HomeAction();
};
$container[App\Action\HomeAction2::class] = function ($c) {
    return new App\Action\HomeAction2();
};
$container[App\Service\TokenAuthValidate::class] = function ($c) {
    return new App\Service\TokenAuthValidate();
};
