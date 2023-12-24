<?php

declare(strict_types=1);

namespace PatrickZuurbier\FormServer\Contracts\Generators;

interface ClassGeneratorInterface
{
    /**
     * @param  string                $stub
     * @param  array<string, string> $replacements
     * @return string
     */
    public function generate(string $stub, array $replacements): string;
}
