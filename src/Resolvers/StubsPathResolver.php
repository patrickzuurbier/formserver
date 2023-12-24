<?php

declare(strict_types=1);

namespace PatrickZuurbier\FormServer\Resolvers;

use Illuminate\Contracts\Foundation\Application;
use PatrickZuurbier\FormServer\Contracts\Resolvers\StubsPathResolverInterface;

class StubsPathResolver implements StubsPathResolverInterface
{
    protected Application $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function resolvePackagePath(string $stubFile): string
    {
        return dirname(__DIR__, 2) .
            DIRECTORY_SEPARATOR .
            'stubs' .
            DIRECTORY_SEPARATOR .
            'formserver' .
            DIRECTORY_SEPARATOR .
            $stubFile;
    }

    public function resolveAppPath(string $stubFile): string
    {
        return $this->app->basePath(
            'stubs' .
            DIRECTORY_SEPARATOR .
            $stubFile,
        );
    }
}
