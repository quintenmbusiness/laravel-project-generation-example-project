<?php

namespace App\Repositories;

use App\Models\ShippingAddress;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class ShippingAddressRepository
{
    public function all(array $columns = ['*']): Collection
    {
        return ShippingAddress::get($columns);
    }

    public function paginate(int $perPage = 15, array $columns = ['*']): LengthAwarePaginator
    {
        return ShippingAddress::paginate($perPage, $columns);
    }

    public function find(int|string $id, array $columns = ['*']): ?ShippingAddress
    {
        return ShippingAddress::find($id, $columns);
    }

    public function findOrFail(int|string $id, array $columns = ['*']): ShippingAddress
    {
        return ShippingAddress::findOrFail($id, $columns);
    }

    public function findBy(array $criteria, array $columns = ['*']): ?ShippingAddress
    {
        return ShippingAddress::where($criteria)->first($columns);
    }

    public function create(array $data): ShippingAddress
    {
        return ShippingAddress::create($data);
    }

    public function update(int|string $id, array $data): ?ShippingAddress
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
        return ShippingAddress::where($criteria)->update($data);
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
        return ShippingAddress::where($criteria)->delete();
    }
}
