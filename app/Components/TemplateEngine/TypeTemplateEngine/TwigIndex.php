<?php

namespace App\Components\TemplateEngine\TypeTemplateEngine;

use App\Components\Interfaces\iTypeTemplateEngine;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\TwigFilter;

class TwigIndex implements iTypeTemplateEngine {

    private FilesystemLoader $loader;
    private Environment $twig;
    private TwigFilter $filter;

    public final function __construct() {
        $this->loader = new FilesystemLoader('app/Views');
        $this->twig = new Environment($this->loader);
        $this->filter = new TwigFilter('route', function (string $route) {
            return array_flip(ROUTES)[$route];
        });
        $this->twig->addFilter($this->filter);
    }

    public function render(string $fille, array $attributes = []): string
    {
        return $this->twig->render($fille, $attributes);
    }
}