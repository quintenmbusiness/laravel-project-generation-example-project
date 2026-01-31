<?php

namespace Tests\Unit\Repositories;

use App\Models\Cache;
use App\Repositories\CacheRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
final class CacheRepositoryTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateAndFind(): void
    {
        $repo = app(CacheRepository::class);
        $model = Cache::factory()->create();
        $found = $repo->find($model->key);
        self::assertNotNull($found);
    }

    public function testUpdateAndDelete(): void
    {
        $repo = app(CacheRepository::class);
        $model = Cache::factory()->create();
        $updated = $repo->update($model->key, []);
        self::assertNotNull($updated);
        $deleted = $repo->delete($model->key);
        self::assertTrue($deleted);
    }

    public function testFindByAndPagination(): void
    {
        $repo = app(CacheRepository::class);
        Cache::factory()->create();
        $result = $repo->paginate();
        self::assertNotNull($result);
    }
}
