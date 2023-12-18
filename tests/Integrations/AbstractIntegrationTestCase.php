<?php

declare(strict_types=1);

namespace PatrickZuurbier\FormServer\Tests\Integration;

use Illuminate\Foundation\Application as BaseApplication;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Orchestra\Testbench\TestCase;
use RuntimeException;

abstract class AbstractIntegrationTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getApplication(): BaseApplication
    {
        if (!$this->app) {
            throw new RuntimeException('Application should be setup');
        }

        return $this->app;
    }
}
