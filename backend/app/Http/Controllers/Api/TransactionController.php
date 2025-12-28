<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TransactionRequest;
use App\Services\TransactionService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    use ApiResponse;

    protected $transactionService;

    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }

    public function index()
    {
        $transaction = $this->transactionService->getAllTransaction();
        return $this->successResponse($transaction, 'Transactions retrieved successfully');
    }

    public function find(string $Oid)
    {
        $transaction = $this->transactionService->getTransactionById($Oid);

        return $transaction
            ? $this->successResponse($transaction, 'Transaction retrieved successfully')
            : $this->errorResponse('Transaction not found', 404);
    }

    public function store(TransactionRequest $request)
    {
        $data = $request->validated();
        $transaction = $this->transactionService->createTransaction($data);
        return $this->successResponse($transaction, 'Transaction created successfully', 201);
    }

    public function update(string $Oid, TransactionRequest $request)
    {
        $transaction = $this
            ->transactionService
            ->updateTransaction($Oid, $request->validated());

        return $transaction
            ? $this->successResponse($transaction, 'Transaction updated successfully')
            : $this->errorResponse('Transaction not found', 404);
    }

    public function destroy(string $Oid)
    {
        $deleted = $this->transactionService->deleteTransaction($Oid);

        return $deleted
            ? $this->successResponse(null, 'Transaction deleted successfully')
            : $this->errorResponse('Transaction not found', 404);
    }
}
