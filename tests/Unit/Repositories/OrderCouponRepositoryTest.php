<?php

namespace Tests\Unit\Repositories;

use App\Models\OrderCoupon;
use App\Repositories\OrderCouponRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
final class OrderCouponRepositoryTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateAndFind(): void
    {
        $repo = app(OrderCouponRepository::class);
        $model = OrderCoupon::factory()->create();
        $found = $repo->find($model->id);
        self::assertNotNull($found);
    }

    public function testUpdateAndDelete(): void
    {
        $repo = app(OrderCouponRepository::class);
        $model = OrderCoupon::factory()->create();
        $updated = $repo->update($model->id, []);
        self::assertNotNull($updated);
        $deleted = $repo->delete($model->id);
        self::assertTrue($deleted);
    }

    public function testFindByAndPagination(): void
    {
        $repo = app(OrderCouponRepository::class);
        OrderCoupon::factory()->create();
        $result = $repo->paginate();
        self::assertNotNull($result);
    }
}
