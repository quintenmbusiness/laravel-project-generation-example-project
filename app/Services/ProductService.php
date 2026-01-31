<?php

namespace App\Services;

use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class ProductService
{
    public function repository(): ProductRepository
    {
        return app(ProductRepository::class);
    }

    public function getAll(int $perPage = 0): Collection|LengthAwarePaginator
    {
        if ($perPage > 0) {
            return $this->repository()->paginate($perPage);
        }

        return $this->repository()->all();
    }

    public function getOrFail(int|string $id): Product
    {
        return $this->repository()->findOrFail($id);
    }

    public function findBy(array $criteria): ?Product
    {
        return $this->repository()->findBy($criteria);
    }

    public function create(array $data): Product
    {
        return $this->repository()->create($data);
    }

    public function update(int|string $id, array $data): ?Product
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
