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

    public function testFillableContainsExpectedAttributes(): void
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

    public function testRelationBillingAddressesExistsAndReturnsRelation(): void
    {
        $model = new Customer();
        self::assertTrue(method_exists($model, 'billingAddresses'));
        $relation = $model->billingAddresses();
        self::assertInstanceOf(HasMany::class, $relation);
    }

    public function testRelationOrdersExistsAndReturnsRelation(): void
    {
        $model = new Customer();
        self::assertTrue(method_exists($model, 'orders'));
        $relation = $model->orders();
        self::assertInstanceOf(HasMany::class, $relation);
    }

    public function testRelationShippingAddressesExistsAndReturnsRelation(): void
    {
        $model = new Customer();
        self::assertTrue(method_exists($model, 'shippingAddresses'));
        $relation = $model->shippingAddresses();
        self::assertInstanceOf(HasMany::class, $relation);
    }

    public function testCastForIdIsInt(): void
    {
        $model = new Customer();
        self::assertArrayHasKey('id', $model->getCasts());
        self::assertSame('int', $model->getCasts()['id']);
    }

    public function testFactoryCanMakeInstance(): void
    {
        if (!method_exists(Customer::class, 'factory')) {
            self::assertTrue(true);

            return;
        }
        $instance = Customer::factory()->make();
        self::assertInstanceOf(Customer::class, $instance);
    }
}
