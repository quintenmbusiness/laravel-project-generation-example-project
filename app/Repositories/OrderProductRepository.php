<?php

namespace App\Repositories;

use App\Models\OrderProduct;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class OrderProductRepository
{
    public function all(array $columns = ['*']): Collection
    {
        return OrderProduct::get($columns);
    }

    public function paginate(int $perPage = 15, array $columns = ['*']): LengthAwarePaginator
    {
        return OrderProduct::paginate($perPage, $columns);
    }

    public function find(int|string $id, array $columns = ['*']): ?OrderProduct
    {
        return OrderProduct::find($id, $columns);
    }

    public function findOrFail(int|string $id, array $columns = ['*']): OrderProduct
    {
        return OrderProduct::findOrFail($id, $columns);
    }

    public function findBy(array $criteria, array $columns = ['*']): ?OrderProduct
    {
        return OrderProduct::where($criteria)->first($columns);
    }

    public function create(array $data): OrderProduct
    {
        return OrderProduct::create($data);
    }

    public function update(int|string $id, array $data): ?OrderProduct
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
        return OrderProduct::where($criteria)->update($data);
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
        return OrderProduct::where($criteria)->delete();
    }
}
