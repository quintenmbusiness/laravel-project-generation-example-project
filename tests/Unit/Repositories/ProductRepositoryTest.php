<?php

namespace Tests\Unit\Repositories;

use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
final class ProductRepositoryTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateAndFind(): void
    {
        $repo = app(ProductRepository::class);
        $model = Product::factory()->create();
        $found = $repo->find($model->id);
        self::assertNotNull($found);
    }

    public function testUpdateAndDelete(): void
    {
        $repo = app(ProductRepository::class);
        $model = Product::factory()->create();
        $updated = $repo->update($model->id, []);
        self::assertNotNull($updated);
        $deleted = $repo->delete($model->id);
        self::assertTrue($deleted);
    }

    public function testFindByAndPagination(): void
    {
        $repo = app(ProductRepository::class);
        Product::factory()->create();
        $result = $repo->paginate();
        self::assertNotNull($result);
    }
}
