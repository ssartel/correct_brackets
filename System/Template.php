<?php

namespace System;


use System\Exceptions\InvalidParamException;

class Template
{
    public static function render(string $template, array $vars = []): string
    {
        $fileName = $template . '.php';

        if (!file_exists($fileName)) {
            throw new InvalidParamException('Template file do not found');
        }

        extract($vars, EXTR_OVERWRITE);
        ob_clean();
        require_once $fileName;

        return ob_get_clean();
    }
}
