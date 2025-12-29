<?php

namespace App\Services;

use App\Models\Detail;
use App\Repositories\DetailRepository;

class DetailService
{
    protected $detailRepository;

    public function __construct(DetailRepository $detailRepository)
    {
        $this->detailRepository = $detailRepository;
    }

    public function createDetail(array $data): Detail
    {
        return $this->detailRepository->create($data);
    }

    public function updateDetail(string $id, array $data): ?Detail
    {
        return $this->detailRepository->update($id, $data);
    }

    public function deleteDetail(string $id): bool
    {
        return $this->detailRepository->delete($id);
    }
}
