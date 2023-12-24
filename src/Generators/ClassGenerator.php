<?php

declare(strict_types=1);

namespace PatrickZuurbier\FormServer\Generators;

use PatrickZuurbier\FormServer\Contracts\Generators\ClassGeneratorInterface;

class ClassGenerator implements ClassGeneratorInterface
{
    public function generate(string $stub, array $replacements): string
    {
        return str_replace(
            array_keys($replacements),
            array_values($replacements),
            $stub,
        );
    }
}
