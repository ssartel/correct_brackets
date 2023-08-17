<?php

use Modules\Check\Controllers\IndexController;
use Modules\Home\Controllers\IndexController as Home;
use System\Router;

Router::get('', Home::class);

Router::get('check', IndexController::class);

