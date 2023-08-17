<?php

namespace System;



abstract class Controller
{
    protected string $title = '';

    abstract public function __invoke();

    protected function render(string $template, array $data = []): string
    {
        if (strpos($template, '.')) {
            $explodePath = explode('.', $template);
            array_splice($explodePath, 1, 0, 'Views');
            $template = implode(DIRECTORY_SEPARATOR, $explodePath);
        }

        return Template::render(TEMPLATES_DIR . 'main', [
            'title' => $this->title,
            'content' => Template::render(MODULES_DIR . $template, $data)
        ]);
    }
}
