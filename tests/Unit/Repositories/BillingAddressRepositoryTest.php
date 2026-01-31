<?php

namespace Tests\Unit\Repositories;

use App\Models\BillingAddress;
use App\Repositories\BillingAddressRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
final class BillingAddressRepositoryTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateAndFind(): void
    {
        $repo = app(BillingAddressRepository::class);
        $model = BillingAddress::factory()->create();
        $found = $repo->find($model->id);
        self::assertNotNull($found);
    }

    public function testUpdateAndDelete(): void
    {
        $repo = app(BillingAddressRepository::class);
        $model = BillingAddress::factory()->create();
        $updated = $repo->update($model->id, []);
        self::assertNotNull($updated);
        $deleted = $repo->delete($model->id);
        self::assertTrue($deleted);
    }

    public function testFindByAndPagination(): void
    {
        $repo = app(BillingAddressRepository::class);
        BillingAddress::factory()->create();
        $result = $repo->paginate();
        self::assertNotNull($result);
    }
}
