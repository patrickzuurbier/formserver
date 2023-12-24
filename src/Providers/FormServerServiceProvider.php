<?php

declare(strict_types=1);

namespace PatrickZuurbier\FormServer\Providers;

use Illuminate\Support\ServiceProvider;
use PatrickZuurbier\FormServer\Console\Commands\CreateFormCommand;
use PatrickZuurbier\FormServer\Contracts\Generators\ClassGeneratorInterface;
use PatrickZuurbier\FormServer\Contracts\Resolvers\ClassResolverInterface;
use PatrickZuurbier\FormServer\Contracts\Resolvers\StubsPathResolverInterface;
use PatrickZuurbier\FormServer\Generators\ClassGenerator;
use PatrickZuurbier\FormServer\Resolvers\ClassResolver;
use PatrickZuurbier\FormServer\Resolvers\StubsPathResolver;

class FormServerServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->registerResolvers();
        $this->registerGenerators();
    }

    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');

        if ($this->app->runningInConsole()) {
            $this->commands([
                CreateFormCommand::class,
            ]);
        }

        $this->publishes([
            $this->getConfigPath() => config_path('formserver.php'),
        ]);
    }

    protected function registerResolvers(): void
    {
        $this->app->singleton(ClassResolverInterface::class, ClassResolver::class);
        $this->app->singleton(StubsPathResolverInterface::class, StubsPathResolver::class);
    }

    protected function registerGenerators(): void
    {
        $this->app->singleton(ClassGeneratorInterface::class, ClassGenerator::class);
        $this->app->singleton(StubsPathResolverInterface::class, StubsPathResolver::class);
    }

    protected function getConfigPath(): string
    {
        return dirname(__DIR__, 2) . '/config/formserver.php';
    }
}
