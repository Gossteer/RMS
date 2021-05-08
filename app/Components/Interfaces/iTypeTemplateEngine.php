<?php

namespace App\Components\Interfaces;

interface iTypeTemplateEngine {
    public function render(string $fille, array $attributes = []): string;
}