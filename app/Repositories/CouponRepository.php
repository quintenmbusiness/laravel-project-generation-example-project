<?php

namespace App\Repositories;

use App\Models\Coupon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class CouponRepository
{
    public function all(array $columns = ['*']): Collection
    {
        return Coupon::get($columns);
    }

    public function paginate(int $perPage = 15, array $columns = ['*']): LengthAwarePaginator
    {
        return Coupon::paginate($perPage, $columns);
    }

    public function find(int|string $id, array $columns = ['*']): ?Coupon
    {
        return Coupon::find($id, $columns);
    }

    public function findOrFail(int|string $id, array $columns = ['*']): Coupon
    {
        return Coupon::findOrFail($id, $columns);
    }

    public function findBy(array $criteria, array $columns = ['*']): ?Coupon
    {
        return Coupon::where($criteria)->first($columns);
    }

    public function create(array $data): Coupon
    {
        return Coupon::create($data);
    }

    public function update(int|string $id, array $data): ?Coupon
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
        return Coupon::where($criteria)->update($data);
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
        return Coupon::where($criteria)->delete();
    }
}
