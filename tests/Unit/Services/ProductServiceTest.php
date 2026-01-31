<?php

namespace Tests\Unit\Services;

use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
final class ProductServiceTest extends TestCase
{
    use RefreshDatabase;

    public function testServiceResolves(): void
    {
        $service = app(ProductService::class);
        self::assertNotNull($service);
    }

    public function testServiceCreateAndGet(): void
    {
        $service = app(ProductService::class);
        $model = Product::factory()->create();
        $result = $service->getOrFail($model->id);
        self::assertNotNull($result);
    }

    public function testServiceUpdateAndDelete(): void
    {
        $service = app(ProductService::class);
        $model = Product::factory()->create();
        $updated = $service->update($model->id, []);
        self::assertNotNull($updated);
        $deleted = $service->delete($model->id);
        self::assertTrue($deleted);
    }
}
