<?php

declare(strict_types=1);

namespace PatrickZuurbier\FormServer\Contracts\Resolvers;

use PatrickZuurbier\FormServer\Data\ClassData;

interface ClassResolverInterface
{
    public function resolve(string $type, string $class): ClassData;
}
