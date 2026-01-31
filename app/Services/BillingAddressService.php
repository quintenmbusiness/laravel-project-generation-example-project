<?php

namespace App\Services;

use App\Models\BillingAddress;
use App\Repositories\BillingAddressRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class BillingAddressService
{
    public function repository(): BillingAddressRepository
    {
        return app(BillingAddressRepository::class);
    }

    public function getAll(int $perPage = 0): Collection|LengthAwarePaginator
    {
        if ($perPage > 0) {
            return $this->repository()->paginate($perPage);
        }

        return $this->repository()->all();
    }

    public function getOrFail(int|string $id): BillingAddress
    {
        return $this->repository()->findOrFail($id);
    }

    public function findBy(array $criteria): ?BillingAddress
    {
        return $this->repository()->findBy($criteria);
    }

    public function create(array $data): BillingAddress
    {
        return $this->repository()->create($data);
    }

    public function update(int|string $id, array $data): ?BillingAddress
    {
        return $this->repository()->update($id, $data);
    }

    public function updateWhere(array $criteria, array $data): int
    {
        return $this->repository()->updateWhere($criteria, $data);
    }

    public function delete(int|string $id): bool
    {
        return $this->repository()->delete($id);
    }

    public function deleteWhere(array $criteria): int
    {
        return $this->repository()->deleteWhere($criteria);
    }
}
