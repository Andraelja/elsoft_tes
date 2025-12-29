<?php
namespace App\Repositories;

use App\Models\Transaction;
use App\Models\Detail;

class DetailRepository 
{
    protected $model;

    public function __construct(Detail $model)
    {
        $this->model = $model;
    }

    public function create(array $data): Detail
    {
        return $this->model->create($data);
    }

    public function update(string $id, array $data): ?Detail
    {
        $detail = $this->model->find($id);
        if ($detail) {
            $detail->update($data);
            return $detail;
        }
        return null;
    }

    public function delete(string $id): bool
    {
        $detail = $this->model->find($id);
        if($detail) {
            return (bool) $detail->delete();
        }
        return false;
    }
}