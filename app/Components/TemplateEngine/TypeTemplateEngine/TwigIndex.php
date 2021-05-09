<?php

namespace App\Components\TemplateEngine\TypeTemplateEngine;

use App\Components\Interfaces\iTypeTemplateEngine;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class TwigIndex implements iTypeTemplateEngine {

    private FilesystemLoader $loader;
    private Environment $twig;

    public final function __construct() {
        $this->loader = new FilesystemLoader('app/Views');
        $this->twig = new Environment($this->loader);
    }

    public function render(string $fille, array $attributes = []): string
    {
        return $this->twig->render($fille, $attributes);
    }
}