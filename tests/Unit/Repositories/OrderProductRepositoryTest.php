<?php

namespace Tests\Unit\Repositories;

use App\Models\OrderProduct;
use App\Repositories\OrderProductRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
final class OrderProductRepositoryTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateAndFind(): void
    {
        $repo = app(OrderProductRepository::class);
        $model = OrderProduct::factory()->create();
        $found = $repo->find($model->id);
        self::assertNotNull($found);
    }

    public function testUpdateAndDelete(): void
    {
        $repo = app(OrderProductRepository::class);
        $model = OrderProduct::factory()->create();
        $updated = $repo->update($model->id, []);
        self::assertNotNull($updated);
        $deleted = $repo->delete($model->id);
        self::assertTrue($deleted);
    }

    public function testFindByAndPagination(): void
    {
        $repo = app(OrderProductRepository::class);
        OrderProduct::factory()->create();
        $result = $repo->paginate();
        self::assertNotNull($result);
    }
}
