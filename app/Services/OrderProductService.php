<?php

namespace App\Services;

use App\Models\OrderProduct;
use App\Repositories\OrderProductRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class OrderProductService
{
    public function repository(): OrderProductRepository
    {
        return app(OrderProductRepository::class);
    }

    public function getAll(int $perPage = 0): Collection|LengthAwarePaginator
    {
        if ($perPage > 0) {
            return $this->repository()->paginate($perPage);
        }

        return $this->repository()->all();
    }

    public function getOrFail(int|string $id): OrderProduct
    {
        return $this->repository()->findOrFail($id);
    }

    public function findBy(array $criteria): ?OrderProduct
    {
        return $this->repository()->findBy($criteria);
    }

    public function create(array $data): OrderProduct
    {
        return $this->repository()->create($data);
    }

    public function update(int|string $id, array $data): ?OrderProduct
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
