<?php

namespace App\Repositories;

use App\Models\OrderCoupon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class OrderCouponRepository
{
    public function all(array $columns = ['*']): Collection
    {
        return OrderCoupon::get($columns);
    }

    public function paginate(int $perPage = 15, array $columns = ['*']): LengthAwarePaginator
    {
        return OrderCoupon::paginate($perPage, $columns);
    }

    public function find(int|string $id, array $columns = ['*']): ?OrderCoupon
    {
        return OrderCoupon::find($id, $columns);
    }

    public function findOrFail(int|string $id, array $columns = ['*']): OrderCoupon
    {
        return OrderCoupon::findOrFail($id, $columns);
    }

    public function findBy(array $criteria, array $columns = ['*']): ?OrderCoupon
    {
        return OrderCoupon::where($criteria)->first($columns);
    }

    public function create(array $data): OrderCoupon
    {
        return OrderCoupon::create($data);
    }

    public function update(int|string $id, array $data): ?OrderCoupon
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
        return OrderCoupon::where($criteria)->update($data);
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
        return OrderCoupon::where($criteria)->delete();
    }
}
