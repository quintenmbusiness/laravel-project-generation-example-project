<?php

namespace Tests\Unit\Models;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
final class CustomerTest extends TestCase
{
    use RefreshDatabase;

    public function testFillableContainsExpectedAttributes()
    {
        $model = new Customer();
        $expected = [
            0 => 'name',
            1 => 'email',
            2 => 'phone',
            3 => 'metadata',
        ];
        $actual = $model->getFillable();
        sort($expected);
        sort($actual);
        self::assertSame($expected, $actual);
    }

    public function testRelationBillingAddressesExistsAndReturnsRelation()
    {
        $model = new Customer();
        self::assertTrue(method_exists($model, 'billingAddresses'));
        $relation = $model->billingAddresses();
        self::assertInstanceOf(HasMany::class, $relation);
    }

    public function testRelationOrdersExistsAndReturnsRelation()
    {
        $model = new Customer();
        self::assertTrue(method_exists($model, 'orders'));
        $relation = $model->orders();
        self::assertInstanceOf(HasMany::class, $relation);
    }

    public function testRelationShippingAddressesExistsAndReturnsRelation()
    {
        $model = new Customer();
        self::assertTrue(method_exists($model, 'shippingAddresses'));
        $relation = $model->shippingAddresses();
        self::assertInstanceOf(HasMany::class, $relation);
    }

    public function testCastForIdIsInt()
    {
        $model = new Customer();
        self::assertArrayHasKey('id', $model->getCasts());
        self::assertSame('int', $model->getCasts()['id']);
    }

    public function testFactoryCanMakeInstance()
    {
        if (!method_exists(Customer::class, 'factory')) {
            self::assertTrue(true);

            return;
        }

        $instance = Customer::factory()->make();
        self::assertInstanceOf(Customer::class, $instance);
    }
}
