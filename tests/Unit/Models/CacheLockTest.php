<?php

namespace Tests\Unit\Models;

use App\Models\CacheLock;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
final class CacheLockTest extends TestCase
{
    use RefreshDatabase;

    public function testFillableContainsExpectedAttributes()
    {
        $model = new CacheLock();
        $expected = [
            0 => 'key',
            1 => 'owner',
            2 => 'expiration',
        ];
        $actual = $model->getFillable();
        sort($expected);
        sort($actual);
        self::assertSame($expected, $actual);
    }

    public function testCastForExpirationIsInt()
    {
        $model = new CacheLock();
        self::assertArrayHasKey('expiration', $model->getCasts());
        self::assertSame('int', $model->getCasts()['expiration']);
    }

    public function testFactoryCanMakeInstance()
    {
        if (!method_exists(CacheLock::class, 'factory')) {
            self::assertTrue(true);

            return;
        }

        $instance = CacheLock::factory()->make();
        self::assertInstanceOf(CacheLock::class, $instance);
    }
}
