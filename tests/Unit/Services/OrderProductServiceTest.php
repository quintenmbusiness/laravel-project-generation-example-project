<?php

namespace Tests\Unit\Services;

use App\Models\OrderProduct;
use App\Services\OrderProductService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
final class OrderProductServiceTest extends TestCase
{
    use RefreshDatabase;

    public function testServiceResolves(): void
    {
        $service = app(OrderProductService::class);
        self::assertNotNull($service);
    }

    public function testServiceCreateAndGet(): void
    {
        $service = app(OrderProductService::class);
        $model = OrderProduct::factory()->create();
        $result = $service->getOrFail($model->id);
        self::assertNotNull($result);
    }

    public function testServiceUpdateAndDelete(): void
    {
        $service = app(OrderProductService::class);
        $model = OrderProduct::factory()->create();
        $updated = $service->update($model->id, []);
        self::assertNotNull($updated);
        $deleted = $service->delete($model->id);
        self::assertTrue($deleted);
    }
}
