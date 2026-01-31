<?php

namespace App\Repositories;

use App\Models\BillingAddress;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class BillingAddressRepository
{
    public function all(array $columns = ['*']): Collection
    {
        return BillingAddress::get($columns);
    }

    public function paginate(int $perPage = 15, array $columns = ['*']): LengthAwarePaginator
    {
        return BillingAddress::paginate($perPage, $columns);
    }

    public function find(int|string $id, array $columns = ['*']): ?BillingAddress
    {
        return BillingAddress::find($id, $columns);
    }

    public function findOrFail(int|string $id, array $columns = ['*']): BillingAddress
    {
        return BillingAddress::findOrFail($id, $columns);
    }

    public function findBy(array $criteria, array $columns = ['*']): ?BillingAddress
    {
        return BillingAddress::where($criteria)->first($columns);
    }

    public function create(array $data): BillingAddress
    {
        return BillingAddress::create($data);
    }

    public function update(int|string $id, array $data): ?BillingAddress
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
        return BillingAddress::where($criteria)->update($data);
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
        return BillingAddress::where($criteria)->delete();
    }
}
