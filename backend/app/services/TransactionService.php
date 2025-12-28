<?php

namespace App\Services;
use App\Repositories\TransactionRepository;
use App\Models\Transaction;

class TransactionService {
    protected $transactionRepository;

    public function __construct(TransactionRepository $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
    }

    public function getAllTransaction()
    {
        return $this->transactionRepository->index();
    }

    public function createTransaction(array $data): Transaction
    {
        return $this->transactionRepository->create($data);
    }

    public function updateTransaction(string $id, array $data): ?Transaction
    {
        return $this->transactionRepository->update($id, $data);
    }

    public function deleteTransaction(string $id): bool
    {
        return $this->transactionRepository->delete($id);
    }

    public function getTransactionById(string $id): ?Transaction
    {
        return $this->transactionRepository->find($id);
    }
}