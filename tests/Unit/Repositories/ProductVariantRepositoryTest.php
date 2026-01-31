<?php

namespace Tests\Unit\Repositories;

use App\Models\ProductVariant;
use App\Repositories\ProductVariantRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
final class ProductVariantRepositoryTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateAndFind(): void
    {
        $repo = app(ProductVariantRepository::class);
        $model = ProductVariant::factory()->create();
        $found = $repo->find($model->id);
        self::assertNotNull($found);
    }

    public function testUpdateAndDelete(): void
    {
        $repo = app(ProductVariantRepository::class);
        $model = ProductVariant::factory()->create();
        $updated = $repo->update($model->id, []);
        self::assertNotNull($updated);
        $deleted = $repo->delete($model->id);
        self::assertTrue($deleted);
    }

    public function testFindByAndPagination(): void
    {
        $repo = app(ProductVariantRepository::class);
        ProductVariant::factory()->create();
        $result = $repo->paginate();
        self::assertNotNull($result);
    }
}
