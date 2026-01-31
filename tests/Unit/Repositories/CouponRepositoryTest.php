<?php

namespace Tests\Unit\Repositories;

use App\Models\Coupon;
use App\Repositories\CouponRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
final class CouponRepositoryTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateAndFind(): void
    {
        $repo = app(CouponRepository::class);
        $model = Coupon::factory()->create();
        $found = $repo->find($model->id);
        self::assertNotNull($found);
    }

    public function testUpdateAndDelete(): void
    {
        $repo = app(CouponRepository::class);
        $model = Coupon::factory()->create();
        $updated = $repo->update($model->id, []);
        self::assertNotNull($updated);
        $deleted = $repo->delete($model->id);
        self::assertTrue($deleted);
    }

    public function testFindByAndPagination(): void
    {
        $repo = app(CouponRepository::class);
        Coupon::factory()->create();
        $result = $repo->paginate();
        self::assertNotNull($result);
    }
}
