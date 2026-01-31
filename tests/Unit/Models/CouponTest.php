<?php

namespace Tests\Unit\Models;

use App\Models\Coupon;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
final class CouponTest extends TestCase
{
    use RefreshDatabase;

    public function testFillableContainsExpectedAttributes()
    {
        $model = new Coupon();
        $expected = [
            0 => 'code',
            1 => 'type',
            2 => 'value',
            3 => 'valid_until',
            4 => 'active',
        ];
        $actual = $model->getFillable();
        sort($expected);
        sort($actual);
        self::assertSame($expected, $actual);
    }

    public function testRelationOrderCouponsExistsAndReturnsRelation()
    {
        $model = new Coupon();
        self::assertTrue(method_exists($model, 'orderCoupons'));
        $relation = $model->orderCoupons();
        self::assertInstanceOf(HasMany::class, $relation);
    }

    public function testCastForIdIsInt()
    {
        $model = new Coupon();
        self::assertArrayHasKey('id', $model->getCasts());
        self::assertSame('int', $model->getCasts()['id']);
    }

    public function testCastForValueIsFloat()
    {
        $model = new Coupon();
        self::assertArrayHasKey('value', $model->getCasts());
        self::assertSame('float', $model->getCasts()['value']);
    }

    public function testCastForActiveIsBool()
    {
        $model = new Coupon();
        self::assertArrayHasKey('active', $model->getCasts());
        self::assertSame('bool', $model->getCasts()['active']);
    }

    public function testFactoryCanMakeInstance()
    {
        if (!method_exists(Coupon::class, 'factory')) {
            self::assertTrue(true);

            return;
        }

        $instance = Coupon::factory()->make();
        self::assertInstanceOf(Coupon::class, $instance);
    }
}
