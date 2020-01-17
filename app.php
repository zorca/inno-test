<?php

define('BASE_PATH', __DIR__);

require __DIR__.'/vendor/autoload.php';

$app = \Slim\Factory\AppFactory::create();

$app->addRoutingMiddleware();

/**
 * Add Error Handling Middleware
 *
 * @param bool $displayErrorDetails -> Should be set to false in production
 * @param bool $logErrors -> Parameter is passed to the default ErrorHandler
 * @param bool $logErrorDetails -> Display error details in error log
 * which can be replaced by a callable of your choice.

 * Note: This middleware should be added last. It will not handle any exceptions/errors
 * for middleware added after it.
 */
$errorMiddleware = $app->addErrorMiddleware(true, true, true);

// Define app routes
$app->get('/', function (Psr\Http\Message\RequestInterface $request, Psr\Http\Message\ResponseInterface $response, $args) {
    $latte = new \Latte\Engine();
    $latte->setTempDirectory(BASE_PATH.'/temp/templates');
    $render = $latte->renderToString(BASE_PATH . '/templates/index.latte');
    $response->getBody()->write($render);
    return $response;
});

// Run app
$app->run();

