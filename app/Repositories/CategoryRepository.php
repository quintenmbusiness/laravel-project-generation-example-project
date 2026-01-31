<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository
{
    public function all(array $columns = ['*']): Collection
    {
        return Category::get($columns);
    }

    public function paginate(int $perPage = 15, array $columns = ['*']): LengthAwarePaginator
    {
        return Category::paginate($perPage, $columns);
    }

    public function find(int|string $id, array $columns = ['*']): ?Category
    {
        return Category::find($id, $columns);
    }

    public function findOrFail(int|string $id, array $columns = ['*']): Category
    {
        return Category::findOrFail($id, $columns);
    }

    public function findBy(array $criteria, array $columns = ['*']): ?Category
    {
        return Category::where($criteria)->first($columns);
    }

    public function create(array $data): Category
    {
        return Category::create($data);
    }

    public function update(int|string $id, array $data): ?Category
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
        return Category::where($criteria)->update($data);
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
        return Category::where($criteria)->delete();
    }
}
