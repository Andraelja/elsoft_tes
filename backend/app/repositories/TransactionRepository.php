<?php

namespace App\Repositories;

use App\Models\Transaction;

class TransactionRepository
{
    protected $model;

    public function __construct(Transaction $model)
    {
        $this->model = $model;
    }

    public function index(int $perPage = 10)
    {
        return $this->model->paginate($perPage);
    }

    public function create(array $data): Transaction
    {
        return $this->model->create($data);
    }

    public function update(string $id, array $data): ?Transaction
    {
        $transaction = $this->model->find($id);
        if ($transaction) {
            $transaction->update($data);
            return $transaction;
        }
        return null;
    }

    public function delete(string $id): bool
    {
        $transaction = $this->model->find($id);
        if($transaction) {
            return (bool) $transaction->delete();
        }
        return false;
    }

    public function find(string $id): ?Transaction
    {
        return $this->model->find($id);
    }
}
