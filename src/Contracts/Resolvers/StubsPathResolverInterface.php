<?php

declare(strict_types=1);

namespace PatrickZuurbier\FormServer\Contracts\Resolvers;

interface StubsPathResolverInterface
{
    public function resolvePackagePath(string $stubFile): string;

    public function resolveAppPath(string $stubFile): string;
}
