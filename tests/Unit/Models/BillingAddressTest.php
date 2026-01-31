<?php

namespace Tests\Unit\Models;

use App\Models\BillingAddress;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
final class BillingAddressTest extends TestCase
{
    use RefreshDatabase;

    public function testFillableContainsExpectedAttributes()
    {
        $model = new BillingAddress();
        $expected = [
            0 => 'customer_id',
            1 => 'label',
            2 => 'line1',
            3 => 'line2',
            4 => 'city',
            5 => 'postal_code',
            6 => 'country',
            7 => 'metadata',
        ];
        $actual = $model->getFillable();
        sort($expected);
        sort($actual);
        self::assertSame($expected, $actual);
    }

    public function testRelationCustomerExistsAndReturnsRelation()
    {
        $model = new BillingAddress();
        self::assertTrue(method_exists($model, 'customer'));
        $relation = $model->customer();
        self::assertInstanceOf(BelongsTo::class, $relation);
    }

    public function testRelationOrdersExistsAndReturnsRelation()
    {
        $model = new BillingAddress();
        self::assertTrue(method_exists($model, 'orders'));
        $relation = $model->orders();
        self::assertInstanceOf(HasMany::class, $relation);
    }

    public function testCastForIdIsInt()
    {
        $model = new BillingAddress();
        self::assertArrayHasKey('id', $model->getCasts());
        self::assertSame('int', $model->getCasts()['id']);
    }

    public function testCastForCustomerIdIsInt()
    {
        $model = new BillingAddress();
        self::assertArrayHasKey('customer_id', $model->getCasts());
        self::assertSame('int', $model->getCasts()['customer_id']);
    }

    public function testFactoryCanMakeInstance()
    {
        if (!method_exists(BillingAddress::class, 'factory')) {
            self::assertTrue(true);

            return;
        }

        $instance = BillingAddress::factory()->make();
        self::assertInstanceOf(BillingAddress::class, $instance);
    }
}
