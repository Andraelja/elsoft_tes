<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ItemRequest;
use App\Services\ItemService;
use App\Repositories\ItemRepository;
use App\Traits\ApiResponse;

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

    public function find($id)
    {
        $item = $this->itemService->getItemById($id);
        if ($item) {
            return $this->successResponse($item, 'Item retrieved successfully');
        }
        return $this->errorResponse('Item not found', 404);
    }

    public function store(ItemRequest $request)
    {
        $data = $request->validated();
        $item = $this->itemService->createItem($data);
        return $this->successResponse($item, 'Item created successfully', 201);
    }

    public function update(ItemRequest $request, $id)
    {
        $data = $request->validated();
        $item = $this->itemService->updateItem($id, $data);
        if ($item) {
            return $this->successResponse($item, 'Item updated successfully');
        }
        return $this->errorResponse('Item not found', 404);
    }

    public function destroy($id)
    {
        $deleted = $this->itemService->deleteItem($id);
        if ($deleted) {
            return $this->successResponse(null, 'Item deleted successfully');
        }
        return $this->errorResponse('Item not found', 404);
    }
}
