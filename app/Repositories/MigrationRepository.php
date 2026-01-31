<?php

namespace App\Repositories;

use App\Models\Migration;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class MigrationRepository
{
    public function all(array $columns = ['*']): Collection
    {
        return Migration::get($columns);
    }

    public function paginate(int $perPage = 15, array $columns = ['*']): LengthAwarePaginator
    {
        return Migration::paginate($perPage, $columns);
    }

    public function find(int|string $id, array $columns = ['*']): ?Migration
    {
        return Migration::find($id, $columns);
    }

    public function findOrFail(int|string $id, array $columns = ['*']): Migration
    {
        return Migration::findOrFail($id, $columns);
    }

    public function findBy(array $criteria, array $columns = ['*']): ?Migration
    {
        return Migration::where($criteria)->first($columns);
    }

    public function create(array $data): Migration
    {
        return Migration::create($data);
    }

    public function update(int|string $id, array $data): ?Migration
    {
        $record = $this->find($id);
        if (!$record) {
            return null;
        }
        $record->fill($data);
        $record->save();

        return $record;
    }

    public function updateWhere(array $criteria, array $data): int
    {
        return Migration::where($criteria)->update($data);
    }

    public function delete(int|string $id): bool
    {
        $record = $this->find($id);
        if (!$record) {
            return false;
        }

        return (bool) $record->delete();
    }

    public function deleteWhere(array $criteria): int
    {
        return Migration::where($criteria)->delete();
    }
}
