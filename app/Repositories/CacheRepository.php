<?php

namespace App\Repositories;

use App\Models\Cache;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class CacheRepository
{
    public function all(array $columns = ['*']): Collection
    {
        return Cache::get($columns);
    }

    public function paginate(int $perPage = 15, array $columns = ['*']): LengthAwarePaginator
    {
        return Cache::paginate($perPage, $columns);
    }

    public function find(int|string $key, array $columns = ['*']): ?Cache
    {
        return Cache::find($key, $columns);
    }

    public function findOrFail(int|string $key, array $columns = ['*']): Cache
    {
        return Cache::findOrFail($key, $columns);
    }

    public function findBy(array $criteria, array $columns = ['*']): ?Cache
    {
        return Cache::where($criteria)->first($columns);
    }

    public function create(array $data): Cache
    {
        return Cache::create($data);
    }

    public function update(int|string $key, array $data): ?Cache
    {
        $record = $this->find($key);
        if (!$record) {
            return null;
        }
        $record->fill($data);
        $record->save();

        return $record;
    }

    public function updateWhere(array $criteria, array $data): int
    {
        return Cache::where($criteria)->update($data);
    }

    public function delete(int|string $key): bool
    {
        $record = $this->find($key);
        if (!$record) {
            return false;
        }

        return (bool) $record->delete();
    }

    public function deleteWhere(array $criteria): int
    {
        return Cache::where($criteria)->delete();
    }
}
