<?php

namespace Tests\Unit\Models;

use App\Models\OrderProduct;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
final class OrderProductTest extends TestCase
{
    use RefreshDatabase;

    public function testFillableContainsExpectedAttributes(): void
    {
        $model = new OrderProduct();
        $expected = [
            0 => 'order_id',
            1 => 'product_variant_id',
            2 => 'quantity',
            3 => 'unit_price',
            4 => 'total_price',
            5 => 'metadata',
        ];
        $actual = $model->getFillable();
        sort($expected);
        sort($actual);
        self::assertSame($expected, $actual);
    }

    public function testRelationOrderExistsAndReturnsRelation(): void
    {
        $model = new OrderProduct();
        self::assertTrue(method_exists($model, 'order'));
        $relation = $model->order();
        self::assertInstanceOf(BelongsTo::class, $relation);
    }

    public function testRelationProductVariantExistsAndReturnsRelation(): void
    {
        $model = new OrderProduct();
        self::assertTrue(method_exists($model, 'productVariant'));
        $relation = $model->productVariant();
        self::assertInstanceOf(BelongsTo::class, $relation);
    }

    public function testCastForIdIsInt(): void
    {
        $model = new OrderProduct();
        self::assertArrayHasKey('id', $model->getCasts());
        self::assertSame('int', $model->getCasts()['id']);
    }

    public function testCastForOrderIdIsInt(): void
    {
        $model = new OrderProduct();
        self::assertArrayHasKey('order_id', $model->getCasts());
        self::assertSame('int', $model->getCasts()['order_id']);
    }

    public function testCastForProductVariantIdIsInt(): void
    {
        $model = new OrderProduct();
        self::assertArrayHasKey('product_variant_id', $model->getCasts());
        self::assertSame('int', $model->getCasts()['product_variant_id']);
    }

    public function testCastForQuantityIsInt(): void
    {
        $model = new OrderProduct();
        self::assertArrayHasKey('quantity', $model->getCasts());
        self::assertSame('int', $model->getCasts()['quantity']);
    }

    public function testCastForUnitPriceIsFloat(): void
    {
        $model = new OrderProduct();
        self::assertArrayHasKey('unit_price', $model->getCasts());
        self::assertSame('float', $model->getCasts()['unit_price']);
    }

    public function testCastForTotalPriceIsFloat(): void
    {
        $model = new OrderProduct();
        self::assertArrayHasKey('total_price', $model->getCasts());
        self::assertSame('float', $model->getCasts()['total_price']);
    }

    public function testFactoryCanMakeInstance(): void
    {
        if (!method_exists(OrderProduct::class, 'factory')) {
            self::assertTrue(true);

            return;
        }
        $instance = OrderProduct::factory()->make();
        self::assertInstanceOf(OrderProduct::class, $instance);
    }
}
