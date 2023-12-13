<?php

declare(strict_types=1);

namespace PatrickZuurbier\FormServer\Providers;

use Illuminate\Support\ServiceProvider;

class FormServerServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
    }
}
