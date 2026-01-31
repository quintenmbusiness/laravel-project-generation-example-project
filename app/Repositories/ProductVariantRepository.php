<?php

namespace App\Repositories;

use App\Models\ProductVariant;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class ProductVariantRepository
{
    public function all(array $columns = ['*']): Collection
    {
        return ProductVariant::get($columns);
    }

    public function paginate(int $perPage = 15, array $columns = ['*']): LengthAwarePaginator
    {
        return ProductVariant::paginate($perPage, $columns);
    }

    public function find(int|string $id, array $columns = ['*']): ?ProductVariant
    {
        return ProductVariant::find($id, $columns);
    }

    public function findOrFail(int|string $id, array $columns = ['*']): ProductVariant
    {
        return ProductVariant::findOrFail($id, $columns);
    }

    public function findBy(array $criteria, array $columns = ['*']): ?ProductVariant
    {
        return ProductVariant::where($criteria)->first($columns);
    }

    public function create(array $data): ProductVariant
    {
        return ProductVariant::create($data);
    }

    public function update(int|string $id, array $data): ?ProductVariant
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
        return ProductVariant::where($criteria)->update($data);
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
        return ProductVariant::where($criteria)->delete();
    }
}
