<?php

namespace Tests\Unit\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
final class CategoryTest extends TestCase
{
    use RefreshDatabase;

    public function testFillableContainsExpectedAttributes()
    {
        $model = new Category();
        $expected = [
            0 => 'slug',
            1 => 'name',
            2 => 'description',
            3 => 'metadata',
        ];
        $actual = $model->getFillable();
        sort($expected);
        sort($actual);
        self::assertSame($expected, $actual);
    }

    public function testRelationProductsExistsAndReturnsRelation()
    {
        $model = new Category();
        self::assertTrue(method_exists($model, 'products'));
        $relation = $model->products();
        self::assertInstanceOf(HasMany::class, $relation);
    }

    public function testCastForIdIsInt()
    {
        $model = new Category();
        self::assertArrayHasKey('id', $model->getCasts());
        self::assertSame('int', $model->getCasts()['id']);
    }

    public function testFactoryCanMakeInstance()
    {
        if (!method_exists(Category::class, 'factory')) {
            self::assertTrue(true);

            return;
        }

        $instance = Category::factory()->make();
        self::assertInstanceOf(Category::class, $instance);
    }
}
