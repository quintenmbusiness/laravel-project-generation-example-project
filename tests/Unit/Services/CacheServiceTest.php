<?php

namespace Tests\Unit\Services;

use App\Models\Cache;
use App\Services\CacheService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
final class CacheServiceTest extends TestCase
{
    use RefreshDatabase;

    public function testServiceResolves(): void
    {
        $service = app(CacheService::class);
        self::assertNotNull($service);
    }

    public function testServiceCreateAndGet(): void
    {
        $service = app(CacheService::class);
        $model = Cache::factory()->create();
        $result = $service->getOrFail($model->key);
        self::assertNotNull($result);
    }

    public function testServiceUpdateAndDelete(): void
    {
        $service = app(CacheService::class);
        $model = Cache::factory()->create();
        $updated = $service->update($model->key, []);
        self::assertNotNull($updated);
        $deleted = $service->delete($model->key);
        self::assertTrue($deleted);
    }
}
