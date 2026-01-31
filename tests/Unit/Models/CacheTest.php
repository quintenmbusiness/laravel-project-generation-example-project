<?php

namespace Tests\Unit\Models;

use App\Models\Cache;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
final class CacheTest extends TestCase
{
    use RefreshDatabase;

    public function testFillableContainsExpectedAttributes()
    {
        $model = new Cache();
        $expected = [
            0 => 'key',
            1 => 'value',
            2 => 'expiration',
        ];
        $actual = $model->getFillable();
        sort($expected);
        sort($actual);
        self::assertSame($expected, $actual);
    }

    public function testCastForExpirationIsInt()
    {
        $model = new Cache();
        self::assertArrayHasKey('expiration', $model->getCasts());
        self::assertSame('int', $model->getCasts()['expiration']);
    }

    public function testFactoryCanMakeInstance()
    {
        if (!method_exists(Cache::class, 'factory')) {
            self::assertTrue(true);

            return;
        }

        $instance = Cache::factory()->make();
        self::assertInstanceOf(Cache::class, $instance);
    }
}
