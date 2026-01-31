<?php

namespace Tests\Unit\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
final class OrderTest extends TestCase
{
    use RefreshDatabase;

    public function testFillableContainsExpectedAttributes()
    {
        $model = new Order();
        $expected = [
            0 => 'order_number',
            1 => 'customer_id',
            2 => 'billing_address_id',
            3 => 'shipping_address_id',
            4 => 'total_amount',
            5 => 'discount_amount',
            6 => 'status',
            7 => 'metadata',
        ];
        $actual = $model->getFillable();
        sort($expected);
        sort($actual);
        self::assertSame($expected, $actual);
    }

    public function testRelationBillingAddressExistsAndReturnsRelation()
    {
        $model = new Order();
        self::assertTrue(method_exists($model, 'billingAddress'));
        $relation = $model->billingAddress();
        self::assertInstanceOf(BelongsTo::class, $relation);
    }

    public function testRelationCustomerExistsAndReturnsRelation()
    {
        $model = new Order();
        self::assertTrue(method_exists($model, 'customer'));
        $relation = $model->customer();
        self::assertInstanceOf(BelongsTo::class, $relation);
    }

    public function testRelationShippingAddressExistsAndReturnsRelation()
    {
        $model = new Order();
        self::assertTrue(method_exists($model, 'shippingAddress'));
        $relation = $model->shippingAddress();
        self::assertInstanceOf(BelongsTo::class, $relation);
    }

    public function testRelationOrderCouponsExistsAndReturnsRelation()
    {
        $model = new Order();
        self::assertTrue(method_exists($model, 'orderCoupons'));
        $relation = $model->orderCoupons();
        self::assertInstanceOf(HasMany::class, $relation);
    }

    public function testRelationOrderProductsExistsAndReturnsRelation()
    {
        $model = new Order();
        self::assertTrue(method_exists($model, 'orderProducts'));
        $relation = $model->orderProducts();
        self::assertInstanceOf(HasMany::class, $relation);
    }

    public function testCastForIdIsInt()
    {
        $model = new Order();
        self::assertArrayHasKey('id', $model->getCasts());
        self::assertSame('int', $model->getCasts()['id']);
    }

    public function testCastForCustomerIdIsInt()
    {
        $model = new Order();
        self::assertArrayHasKey('customer_id', $model->getCasts());
        self::assertSame('int', $model->getCasts()['customer_id']);
    }

    public function testCastForBillingAddressIdIsInt()
    {
        $model = new Order();
        self::assertArrayHasKey('billing_address_id', $model->getCasts());
        self::assertSame('int', $model->getCasts()['billing_address_id']);
    }

    public function testCastForShippingAddressIdIsInt()
    {
        $model = new Order();
        self::assertArrayHasKey('shipping_address_id', $model->getCasts());
        self::assertSame('int', $model->getCasts()['shipping_address_id']);
    }

    public function testCastForTotalAmountIsFloat()
    {
        $model = new Order();
        self::assertArrayHasKey('total_amount', $model->getCasts());
        self::assertSame('float', $model->getCasts()['total_amount']);
    }

    public function testCastForDiscountAmountIsFloat()
    {
        $model = new Order();
        self::assertArrayHasKey('discount_amount', $model->getCasts());
        self::assertSame('float', $model->getCasts()['discount_amount']);
    }

    public function testFactoryCanMakeInstance()
    {
        if (!method_exists(Order::class, 'factory')) {
            self::assertTrue(true);

            return;
        }

        $instance = Order::factory()->make();
        self::assertInstanceOf(Order::class, $instance);
    }
}
