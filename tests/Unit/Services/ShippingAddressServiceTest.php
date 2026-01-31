<?php

namespace Tests\Unit\Services;

use App\Models\ShippingAddress;
use App\Services\ShippingAddressService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
final class ShippingAddressServiceTest extends TestCase
{
    use RefreshDatabase;

    public function testServiceResolves(): void
    {
        $service = app(ShippingAddressService::class);
        self::assertNotNull($service);
    }

    public function testServiceCreateAndGet(): void
    {
        $service = app(ShippingAddressService::class);
        $model = ShippingAddress::factory()->create();
        $result = $service->getOrFail($model->id);
        self::assertNotNull($result);
    }

    public function testServiceUpdateAndDelete(): void
    {
        $service = app(ShippingAddressService::class);
        $model = ShippingAddress::factory()->create();
        $updated = $service->update($model->id, []);
        self::assertNotNull($updated);
        $deleted = $service->delete($model->id);
        self::assertTrue($deleted);
    }
}
