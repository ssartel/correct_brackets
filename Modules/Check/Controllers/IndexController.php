<?php

namespace Modules\Check\Controllers;


use System\Controller;

class IndexController extends Controller
{
    public function __invoke(): string
    {
        $this->title = 'Checking of brackets';

        $answer = 'incorrect';
        $class = 'danger';

        if (!empty($_REQUEST['expression']) && $this->isCorrectBrackets($_REQUEST['expression'])) {
            $answer = 'correct';
            $class = 'success';
        }

        return $this->render('check.index', compact('answer', 'class'));
    }

    public function isCorrectBrackets (string $expression) :bool
    {
        $stack = [];
        $brackets = ['(' => ')', '[' => ']', '{' => '}'];

        for ($i = 0, $iMax = strlen($expression); $i < $iMax; $i++) {
            $char = $expression[$i];

            if (array_key_exists($char, $brackets)) {
                $stack[] = $char;
            } elseif (in_array($char, array_values($brackets))) {
                if (empty($stack) || $char !== $brackets[array_pop($stack)]) {
                    return false;
                }
            }
        }

        return empty($stack);
    }
}
