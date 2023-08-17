<?php

use System\Exceptions\NotFoundException;
use System\Exceptions\InvalidParamException;
use System\Router;
use System\Template;

include_once('../config.php');
include_once(SYSTEM . 'helpers.php');
include_once(SYSTEM . 'autoloader.php');
include_once(CONFIG . 'routes.php');

try {
    $controller = Router::run();
    echo $controller();
} catch (NotFoundException $e) {
    echo Template::render(TEMPLATES_DIR . 'main', [
        'title' => $e->getCode(),
        'content' => $e->getMessage()
    ]);
} catch (InvalidParamException|Exception $e) {
    echo $e->getMessage();
}
