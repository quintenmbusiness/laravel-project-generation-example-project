<?php

namespace Tests\Unit\Services;

use App\Models\CacheLock;
use App\Services\CacheLockService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
final class CacheLockServiceTest extends TestCase
{
    use RefreshDatabase;

    public function testServiceResolves(): void
    {
        $service = app(CacheLockService::class);
        self::assertNotNull($service);
    }

    public function testServiceCreateAndGet(): void
    {
        $service = app(CacheLockService::class);
        $model = CacheLock::factory()->create();
        $result = $service->getOrFail($model->key);
        self::assertNotNull($result);
    }

    public function testServiceUpdateAndDelete(): void
    {
        $service = app(CacheLockService::class);
        $model = CacheLock::factory()->create();
        $updated = $service->update($model->key, []);
        self::assertNotNull($updated);
        $deleted = $service->delete($model->key);
        self::assertTrue($deleted);
    }
}
