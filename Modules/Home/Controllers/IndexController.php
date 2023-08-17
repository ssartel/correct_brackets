<?php

namespace Modules\Home\Controllers;


use System\Controller;

class IndexController extends Controller
{
    public function __invoke(): string
    {
        $this->title = 'Home';

        return $this->render('home.index');
    }
}
