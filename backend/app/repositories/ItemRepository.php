<?php
namespace App\Repositories;

use App\Models\Item;

class ItemRepository
{
    protected $model;

    public function __construct(Item $model)
    {
        $this->model = $model;
    }

    public function index(int $perPage = 10)
    {
        return $this->model->paginate($perPage);
    }

    public function create(array $data): Item
    {
        return $this->model->create($data);
    }

    public function update(string $id, array $data): ?Item
    {
        $item = $this->model->find($id);
        if ($item) {
            $item->update($data);
            return $item;
        }
        return null;
    }

    public function delete(string $id): bool
    {
        $item = $this->model->find($id);
        if ($item) {
            return (bool) $item->delete();
        }
        return false;
    }

    public function find(string $id): ?Item
    {
        return $this->model->find($id);
    }
}