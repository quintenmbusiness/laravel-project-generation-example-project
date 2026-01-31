<?php

namespace Tests\Unit\Services;

use App\Models\BillingAddress;
use App\Services\BillingAddressService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
final class BillingAddressServiceTest extends TestCase
{
    use RefreshDatabase;

    public function testServiceResolves(): void
    {
        $service = app(BillingAddressService::class);
        self::assertNotNull($service);
    }

    public function testServiceCreateAndGet(): void
    {
        $service = app(BillingAddressService::class);
        $model = BillingAddress::factory()->create();
        $result = $service->getOrFail($model->id);
        self::assertNotNull($result);
    }

    public function testServiceUpdateAndDelete(): void
    {
        $service = app(BillingAddressService::class);
        $model = BillingAddress::factory()->create();
        $updated = $service->update($model->id, []);
        self::assertNotNull($updated);
        $deleted = $service->delete($model->id);
        self::assertTrue($deleted);
    }
}
