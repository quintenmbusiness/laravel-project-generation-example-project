<?php

namespace App\Repositories;

use App\Models\Customer;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class CustomerRepository
{
    public function all(array $columns = ['*']): Collection
    {
        return Customer::get($columns);
    }

    public function paginate(int $perPage = 15, array $columns = ['*']): LengthAwarePaginator
    {
        return Customer::paginate($perPage, $columns);
    }

    public function find(int|string $id, array $columns = ['*']): ?Customer
    {
        return Customer::find($id, $columns);
    }

    public function findOrFail(int|string $id, array $columns = ['*']): Customer
    {
        return Customer::findOrFail($id, $columns);
    }

    public function findBy(array $criteria, array $columns = ['*']): ?Customer
    {
        return Customer::where($criteria)->first($columns);
    }

    public function create(array $data): Customer
    {
        return Customer::create($data);
    }

    public function update(int|string $id, array $data): ?Customer
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
        return Customer::where($criteria)->update($data);
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
        return Customer::where($criteria)->delete();
    }
}
