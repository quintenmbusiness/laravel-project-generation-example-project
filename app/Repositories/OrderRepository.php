<?php

namespace App\Repositories;

use App\Models\Order;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class OrderRepository
{
    public function all(array $columns = ['*']): Collection
    {
        return Order::get($columns);
    }

    public function paginate(int $perPage = 15, array $columns = ['*']): LengthAwarePaginator
    {
        return Order::paginate($perPage, $columns);
    }

    public function find(int|string $id, array $columns = ['*']): ?Order
    {
        return Order::find($id, $columns);
    }

    public function findOrFail(int|string $id, array $columns = ['*']): Order
    {
        return Order::findOrFail($id, $columns);
    }

    public function findBy(array $criteria, array $columns = ['*']): ?Order
    {
        return Order::where($criteria)->first($columns);
    }

    public function create(array $data): Order
    {
        return Order::create($data);
    }

    public function update(int|string $id, array $data): ?Order
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
        return Order::where($criteria)->update($data);
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
        return Order::where($criteria)->delete();
    }
}
