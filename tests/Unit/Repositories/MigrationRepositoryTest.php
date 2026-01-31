<?php

namespace Tests\Unit\Repositories;

use App\Models\Migration;
use App\Repositories\MigrationRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
final class MigrationRepositoryTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateAndFind(): void
    {
        $repo = app(MigrationRepository::class);
        $model = Migration::factory()->create();
        $found = $repo->find($model->id);
        self::assertNotNull($found);
    }

    public function testUpdateAndDelete(): void
    {
        $repo = app(MigrationRepository::class);
        $model = Migration::factory()->create();
        $updated = $repo->update($model->id, []);
        self::assertNotNull($updated);
        $deleted = $repo->delete($model->id);
        self::assertTrue($deleted);
    }

    public function testFindByAndPagination(): void
    {
        $repo = app(MigrationRepository::class);
        Migration::factory()->create();
        $result = $repo->paginate();
        self::assertNotNull($result);
    }
}
