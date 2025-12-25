<?php

namespace App\Services;
use App\Repositories\ItemRepository;
use App\Models\Item;

class ItemService
{
    protected $itemRepository;

    public function __construct(ItemRepository $itemRepository)
    {
        $this->itemRepository = $itemRepository;
    }

    public function getAllItems()
    {
        return $this->itemRepository->index();
    }

    public function createItem(array $data): Item
    {
        return $this->itemRepository->create($data);
    }

    public function updateItem(string $id, array $data): ?Item
    {
        return $this->itemRepository->update($id, $data);
    }

    public function deleteItem(string $id): bool
    {
        return $this->itemRepository->delete($id);
    }

    public function getItemById(string $id): ?Item
    {
        return $this->itemRepository->find($id);
    }
}