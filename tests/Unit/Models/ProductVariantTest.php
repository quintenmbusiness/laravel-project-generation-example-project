<?php

namespace Tests\Unit\Models;

use App\Models\ProductVariant;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
final class ProductVariantTest extends TestCase
{
    use RefreshDatabase;

    public function testFillableContainsExpectedAttributes(): void
    {
        $model = new ProductVariant();
        $expected = [
            0 => 'product_id',
            1 => 'sku',
            2 => 'name',
            3 => 'price',
            4 => 'stock',
            5 => 'attributes',
        ];
        $actual = $model->getFillable();
        sort($expected);
        sort($actual);
        self::assertSame($expected, $actual);
    }

    public function testRelationProductExistsAndReturnsRelation(): void
    {
        $model = new ProductVariant();
        self::assertTrue(method_exists($model, 'product'));
        $relation = $model->product();
        self::assertInstanceOf(BelongsTo::class, $relation);
    }

    public function testRelationOrderProductsExistsAndReturnsRelation(): void
    {
        $model = new ProductVariant();
        self::assertTrue(method_exists($model, 'orderProducts'));
        $relation = $model->orderProducts();
        self::assertInstanceOf(HasMany::class, $relation);
    }

    public function testCastForIdIsInt(): void
    {
        $model = new ProductVariant();
        self::assertArrayHasKey('id', $model->getCasts());
        self::assertSame('int', $model->getCasts()['id']);
    }

    public function testCastForProductIdIsInt(): void
    {
        $model = new ProductVariant();
        self::assertArrayHasKey('product_id', $model->getCasts());
        self::assertSame('int', $model->getCasts()['product_id']);
    }

    public function testCastForPriceIsFloat(): void
    {
        $model = new ProductVariant();
        self::assertArrayHasKey('price', $model->getCasts());
        self::assertSame('float', $model->getCasts()['price']);
    }

    public function testCastForStockIsInt(): void
    {
        $model = new ProductVariant();
        self::assertArrayHasKey('stock', $model->getCasts());
        self::assertSame('int', $model->getCasts()['stock']);
    }

    public function testFactoryCanMakeInstance(): void
    {
        if (!method_exists(ProductVariant::class, 'factory')) {
            self::assertTrue(true);

            return;
        }
        $instance = ProductVariant::factory()->make();
        self::assertInstanceOf(ProductVariant::class, $instance);
    }
}
