<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ItemRequest;
use App\Services\ItemService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    use ApiResponse;

    protected $itemService;

    public function __construct(ItemService $itemService)
    {
        $this->itemService = $itemService;
    }

    public function index()
    {
        $items = $this->itemService->getAllItems();
        return $this->successResponse($items, 'Items retrieved successfully');
    }

    public function find(string $Oid)
    {
        $item = $this->itemService->getItemById($Oid);

        return $item
            ? $this->successResponse($item, 'Item retrieved successfully')
            : $this->errorResponse('Item not found', 404);
    }

    public function store(ItemRequest $request)
    {
        $data = $request->validated();
        $item = $this->itemService->createItem($data);
        return $this->successResponse($item, 'Item created successfully', 201);
    }

    public function save(Request $request)
    {
        $oid = $request->query('Oid');

        if ($oid) {
            $item = $this->itemService->updateItem($oid, $request->all());
            return $item
                ? $this->successResponse($item, 'Item updated successfully')
                : $this->errorResponse('Item not found', 404);
        }

        $item = $this->itemService->createItem($request->all());
        return $this->successResponse($item, 'Item created successfully', 201);
    }

    public function destroy(string $Oid)
    {
        $deleted = $this->itemService->deleteItem($Oid);

        return $deleted
            ? $this->successResponse(null, 'Item deleted successfully')
            : $this->errorResponse('Item not found', 404);
    }
}
