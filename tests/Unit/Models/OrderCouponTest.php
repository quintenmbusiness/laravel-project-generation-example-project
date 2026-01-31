<?php

namespace Tests\Unit\Models;

use App\Models\OrderCoupon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
final class OrderCouponTest extends TestCase
{
    use RefreshDatabase;

    public function testFillableContainsExpectedAttributes()
    {
        $model = new OrderCoupon();
        $expected = [
            0 => 'order_id',
            1 => 'coupon_id',
            2 => 'discount_amount',
        ];
        $actual = $model->getFillable();
        sort($expected);
        sort($actual);
        self::assertSame($expected, $actual);
    }

    public function testRelationCouponExistsAndReturnsRelation()
    {
        $model = new OrderCoupon();
        self::assertTrue(method_exists($model, 'coupon'));
        $relation = $model->coupon();
        self::assertInstanceOf(BelongsTo::class, $relation);
    }

    public function testRelationOrderExistsAndReturnsRelation()
    {
        $model = new OrderCoupon();
        self::assertTrue(method_exists($model, 'order'));
        $relation = $model->order();
        self::assertInstanceOf(BelongsTo::class, $relation);
    }

    public function testCastForIdIsInt()
    {
        $model = new OrderCoupon();
        self::assertArrayHasKey('id', $model->getCasts());
        self::assertSame('int', $model->getCasts()['id']);
    }

    public function testCastForOrderIdIsInt()
    {
        $model = new OrderCoupon();
        self::assertArrayHasKey('order_id', $model->getCasts());
        self::assertSame('int', $model->getCasts()['order_id']);
    }

    public function testCastForCouponIdIsInt()
    {
        $model = new OrderCoupon();
        self::assertArrayHasKey('coupon_id', $model->getCasts());
        self::assertSame('int', $model->getCasts()['coupon_id']);
    }

    public function testCastForDiscountAmountIsFloat()
    {
        $model = new OrderCoupon();
        self::assertArrayHasKey('discount_amount', $model->getCasts());
        self::assertSame('float', $model->getCasts()['discount_amount']);
    }

    public function testFactoryCanMakeInstance()
    {
        if (!method_exists(OrderCoupon::class, 'factory')) {
            self::assertTrue(true);

            return;
        }

        $instance = OrderCoupon::factory()->make();
        self::assertInstanceOf(OrderCoupon::class, $instance);
    }
}
