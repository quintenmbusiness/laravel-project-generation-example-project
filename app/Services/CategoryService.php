<?php

namespace App\Services;

use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class CategoryService
{
    public function repository(): CategoryRepository
    {
        return app(CategoryRepository::class);
    }

    public function getAll(int $perPage = 0): Collection|LengthAwarePaginator
    {
        if ($perPage > 0) {
            return $this->repository()->paginate($perPage);
        }

        return $this->repository()->all();
    }

    public function getOrFail(int|string $id): Category
    {
        return $this->repository()->findOrFail($id);
    }

    public function findBy(array $criteria): ?Category
    {
        return $this->repository()->findBy($criteria);
    }

    public function create(array $data): Category
    {
        return $this->repository()->create($data);
    }

    public function update(int|string $id, array $data): ?Category
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
