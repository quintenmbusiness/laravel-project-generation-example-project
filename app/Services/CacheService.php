<?php

namespace App\Services;

use App\Models\Cache;
use App\Repositories\CacheRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class CacheService
{
    public function repository(): CacheRepository
    {
        return app(CacheRepository::class);
    }

    public function getAll(int $perPage = 0): Collection|LengthAwarePaginator
    {
        if ($perPage > 0) {
            return $this->repository()->paginate($perPage);
        }

        return $this->repository()->all();
    }

    public function getOrFail(int|string $key): Cache
    {
        return $this->repository()->findOrFail($key);
    }

    public function findBy(array $criteria): ?Cache
    {
        return $this->repository()->findBy($criteria);
    }

    public function create(array $data): Cache
    {
        return $this->repository()->create($data);
    }

    public function update(int|string $key, array $data): ?Cache
    {
        return $this->repository()->update($key, $data);
    }

    public function updateWhere(array $criteria, array $data): int
    {
        return $this->repository()->updateWhere($criteria, $data);
    }

    public function delete(int|string $key): bool
    {
        return $this->repository()->delete($key);
    }

    public function deleteWhere(array $criteria): int
    {
        return $this->repository()->deleteWhere($criteria);
    }
}
