<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class ProductRepository
{
    public function all(array $columns = ['*']): Collection
    {
        return Product::get($columns);
    }

    public function paginate(int $perPage = 15, array $columns = ['*']): LengthAwarePaginator
    {
        return Product::paginate($perPage, $columns);
    }

    public function find(int|string $id, array $columns = ['*']): ?Product
    {
        return Product::find($id, $columns);
    }

    public function findOrFail(int|string $id, array $columns = ['*']): Product
    {
        return Product::findOrFail($id, $columns);
    }

    public function findBy(array $criteria, array $columns = ['*']): ?Product
    {
        return Product::where($criteria)->first($columns);
    }

    public function create(array $data): Product
    {
        return Product::create($data);
    }

    public function update(int|string $id, array $data): ?Product
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
        return Product::where($criteria)->update($data);
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
        return Product::where($criteria)->delete();
    }
}
