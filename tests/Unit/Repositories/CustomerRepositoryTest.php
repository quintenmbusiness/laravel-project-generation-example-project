<?php

namespace Tests\Unit\Repositories;

use App\Models\Customer;
use App\Repositories\CustomerRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
final class CustomerRepositoryTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateAndFind(): void
    {
        $repo = app(CustomerRepository::class);
        $model = Customer::factory()->create();
        $found = $repo->find($model->id);
        self::assertNotNull($found);
    }

    public function testUpdateAndDelete(): void
    {
        $repo = app(CustomerRepository::class);
        $model = Customer::factory()->create();
        $updated = $repo->update($model->id, []);
        self::assertNotNull($updated);
        $deleted = $repo->delete($model->id);
        self::assertTrue($deleted);
    }

    public function testFindByAndPagination(): void
    {
        $repo = app(CustomerRepository::class);
        Customer::factory()->create();
        $result = $repo->paginate();
        self::assertNotNull($result);
    }
}
