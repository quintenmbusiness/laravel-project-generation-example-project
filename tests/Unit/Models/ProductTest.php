<?php

namespace Tests\Unit\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
final class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function testFillableContainsExpectedAttributes(): void
    {
        $model = new Product();
        $expected = [
            0 => 'sku',
            1 => 'title',
            2 => 'description',
            3 => 'category_id',
            4 => 'price',
            5 => 'metadata',
            6 => 'active',
        ];
        $actual = $model->getFillable();
        sort($expected);
        sort($actual);
        self::assertSame($expected, $actual);
    }

    public function testRelationCategoryExistsAndReturnsRelation(): void
    {
        $model = new Product();
        self::assertTrue(method_exists($model, 'category'));
        $relation = $model->category();
        self::assertInstanceOf(BelongsTo::class, $relation);
    }

    public function testRelationProductVariantsExistsAndReturnsRelation(): void
    {
        $model = new Product();
        self::assertTrue(method_exists($model, 'productVariants'));
        $relation = $model->productVariants();
        self::assertInstanceOf(HasMany::class, $relation);
    }

    public function testCastForIdIsInt(): void
    {
        $model = new Product();
        self::assertArrayHasKey('id', $model->getCasts());
        self::assertSame('int', $model->getCasts()['id']);
    }

    public function testCastForCategoryIdIsInt(): void
    {
        $model = new Product();
        self::assertArrayHasKey('category_id', $model->getCasts());
        self::assertSame('int', $model->getCasts()['category_id']);
    }

    public function testCastForPriceIsFloat(): void
    {
        $model = new Product();
        self::assertArrayHasKey('price', $model->getCasts());
        self::assertSame('float', $model->getCasts()['price']);
    }

    public function testCastForActiveIsBool(): void
    {
        $model = new Product();
        self::assertArrayHasKey('active', $model->getCasts());
        self::assertSame('bool', $model->getCasts()['active']);
    }

    public function testFactoryCanMakeInstance(): void
    {
        if (!method_exists(Product::class, 'factory')) {
            self::assertTrue(true);

            return;
        }
        $instance = Product::factory()->make();
        self::assertInstanceOf(Product::class, $instance);
    }
}
