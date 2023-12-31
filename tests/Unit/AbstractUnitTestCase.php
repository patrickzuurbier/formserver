<?php

declare(strict_types=1);

namespace PatrickZuurbier\FormServer\Tests\Unit;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

abstract class AbstractUnitTest extends TestCase
{
    use MockeryPHPUnitIntegration;
}
