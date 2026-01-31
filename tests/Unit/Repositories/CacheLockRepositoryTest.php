<?php

namespace Tests\Unit\Repositories;

use App\Models\CacheLock;
use App\Repositories\CacheLockRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
final class CacheLockRepositoryTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateAndFind(): void
    {
        $repo = app(CacheLockRepository::class);
        $model = CacheLock::factory()->create();
        $found = $repo->find($model->key);
        self::assertNotNull($found);
    }

    public function testUpdateAndDelete(): void
    {
        $repo = app(CacheLockRepository::class);
        $model = CacheLock::factory()->create();
        $updated = $repo->update($model->key, []);
        self::assertNotNull($updated);
        $deleted = $repo->delete($model->key);
        self::assertTrue($deleted);
    }

    public function testFindByAndPagination(): void
    {
        $repo = app(CacheLockRepository::class);
        CacheLock::factory()->create();
        $result = $repo->paginate();
        self::assertNotNull($result);
    }
}
