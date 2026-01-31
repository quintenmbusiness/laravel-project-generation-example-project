<?php

namespace Tests\Unit\Repositories;

use App\Models\ShippingAddress;
use App\Repositories\ShippingAddressRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
final class ShippingAddressRepositoryTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateAndFind(): void
    {
        $repo = app(ShippingAddressRepository::class);
        $model = ShippingAddress::factory()->create();
        $found = $repo->find($model->id);
        self::assertNotNull($found);
    }

    public function testUpdateAndDelete(): void
    {
        $repo = app(ShippingAddressRepository::class);
        $model = ShippingAddress::factory()->create();
        $updated = $repo->update($model->id, []);
        self::assertNotNull($updated);
        $deleted = $repo->delete($model->id);
        self::assertTrue($deleted);
    }

    public function testFindByAndPagination(): void
    {
        $repo = app(ShippingAddressRepository::class);
        ShippingAddress::factory()->create();
        $result = $repo->paginate();
        self::assertNotNull($result);
    }
}
