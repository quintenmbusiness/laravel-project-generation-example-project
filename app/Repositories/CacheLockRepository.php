<?php

namespace App\Repositories;

use App\Models\CacheLock;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class CacheLockRepository
{
    public function all(array $columns = ['*']): Collection
    {
        return CacheLock::get($columns);
    }

    public function paginate(int $perPage = 15, array $columns = ['*']): LengthAwarePaginator
    {
        return CacheLock::paginate($perPage, $columns);
    }

    public function find(int|string $key, array $columns = ['*']): ?CacheLock
    {
        return CacheLock::find($key, $columns);
    }

    public function findOrFail(int|string $key, array $columns = ['*']): CacheLock
    {
        return CacheLock::findOrFail($key, $columns);
    }

    public function findBy(array $criteria, array $columns = ['*']): ?CacheLock
    {
        return CacheLock::where($criteria)->first($columns);
    }

    public function create(array $data): CacheLock
    {
        return CacheLock::create($data);
    }

    public function update(int|string $key, array $data): ?CacheLock
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
        return CacheLock::where($criteria)->update($data);
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
        return CacheLock::where($criteria)->delete();
    }
}
