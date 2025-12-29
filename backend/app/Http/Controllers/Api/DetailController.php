<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DetailRequest;
use App\Services\DetailService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    use ApiResponse;

    protected $detailService;

    public function __construct(DetailService $detailService)
    {
        $this->detailService = $detailService;
    }

    public function store(DetailRequest $request)
    {
        $data = $request->validated();
        $data['transactionId'] = $request->query('StockIssue');
        $detail = $this->detailService->createDetail($data);
        return $this->successResponse($detail, 'Detail created successfully', 201);
    }
}
