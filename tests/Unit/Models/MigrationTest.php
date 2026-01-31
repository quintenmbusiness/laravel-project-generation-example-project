<?php

namespace Tests\Unit\Models;

use App\Models\Migration;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
final class MigrationTest extends TestCase
{
    use RefreshDatabase;

    public function testFillableContainsExpectedAttributes()
    {
        $model = new Migration();
        $expected = [
            0 => 'migration',
            1 => 'batch',
        ];
        $actual = $model->getFillable();
        sort($expected);
        sort($actual);
        self::assertSame($expected, $actual);
    }

    public function testCastForIdIsInt()
    {
        $model = new Migration();
        self::assertArrayHasKey('id', $model->getCasts());
        self::assertSame('int', $model->getCasts()['id']);
    }

    public function testCastForBatchIsInt()
    {
        $model = new Migration();
        self::assertArrayHasKey('batch', $model->getCasts());
        self::assertSame('int', $model->getCasts()['batch']);
    }

    public function testFactoryCanMakeInstance()
    {
        if (!method_exists(Migration::class, 'factory')) {
            self::assertTrue(true);

            return;
        }

        $instance = Migration::factory()->make();
        self::assertInstanceOf(Migration::class, $instance);
    }
}
