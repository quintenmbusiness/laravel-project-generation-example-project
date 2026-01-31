<?php

namespace Tests\Unit\Services;

use App\Models\Customer;
use App\Services\CustomerService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
final class CustomerServiceTest extends TestCase
{
    use RefreshDatabase;

    public function testServiceResolves(): void
    {
        $service = app(CustomerService::class);
        self::assertNotNull($service);
    }

    public function testServiceCreateAndGet(): void
    {
        $service = app(CustomerService::class);
        $model = Customer::factory()->create();
        $result = $service->getOrFail($model->id);
        self::assertNotNull($result);
    }

    public function testServiceUpdateAndDelete(): void
    {
        $service = app(CustomerService::class);
        $model = Customer::factory()->create();
        $updated = $service->update($model->id, []);
        self::assertNotNull($updated);
        $deleted = $service->delete($model->id);
        self::assertTrue($deleted);
    }
}
